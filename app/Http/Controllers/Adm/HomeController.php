<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner1;
use App\Models\File;
use Validator;
use Classes\Helpers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $return = ['title' => 'HOME / Banner 1'];
        $erros = false;
        $firstCall = true;


        if ($request->isMethod('post'))
        {
            $firstCall = false;
            $validator = $this->validator($request);

            if (!$validator->fails())
            {
                switch ( $request->input('action') )
                {
                    case 'register':
                        $this->register($request);
                        break;
                    case 'order':
                        $this->order($request);
                        break;
                    case 'delete':
                        $this->delete($request);
                        break;
                }
            }
            else
            {
              $erros = true;
            }
        }

        $banner1 = new Banner1();
        $return['banner1'] = $banner1->listBanner1();
        if($erros)
        {
          return view('adm.home')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.home')->withReturn($return);
          } else {
              return redirect('/adm/home'); //Adicionado o redirect para limpar o post
          }
        }

    }


    private function validator($request)
    {
        switch ( $request->input('action') )
        {
            case 'register':
                $rules = [
                    'file.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
                    'link' => 'nullable|max:240'
                ];
                $messages = [
                    'file.*.image' => 'Para o campo Logo só é permitido arquivos do tipo imagem.',
                    'file.*.dimensions' => 'Para o Logo a imagem não pode ser de dimensões inferiores que 100x100.',
                    'link.max' => 'Campo link não pode ter mais do que 240 caracteres.'
                ];
                break;
            case 'edit':
                $rules = [
                    'id' => 'required',
                    'file.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
                    'link' => 'nullable|max:240'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado.',
                    'file.*.image' => 'Para o campo imagem logo só é permitido arquivos do tipo imagem.',
                    'file.*.dimensions' => 'Para a imagem logo a imagem não pode ser de dimensões inferiores que 100x100.',
                    'link.max' => 'Campo link não pode ter mais do que 240 caracteres.'
                ];
                break;
            case 'delete':
                $rules = [
                    'id' => 'required'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!'
                ];
                break;
            case 'delete-image':
                $rules = [
                    'id' => 'required',
                    'campo' => 'required',
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!',
                    'campo.required' => 'Não foi possivel indentificar o campo a ser excluído!',
                ];
                break;
            case 'order':
                $rules = [
                  'id' => 'required',
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!',
                ];
                break;
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        return $validator;
    }


    private function register(Request $request)
    {
          $register = new Banner1();
          $register->text = $request->input('text');
          $register->link = $request->input('link');

          $helpers = new Helpers;

          // -------------------------------------------------------------------
          // FileImageHeight
          // -------------------------------------------------------------------
          if (count($request->file('file')))
          {
              $params = [
                  'files' => $request->file('file'),
                  'model' => 'File',
                  'thumb' => true,
                  'path' => 'images/_Banner1',
                  'pathThumb' => 'images/_Banner1/_Thumbs'
              ];
              $idArray = $helpers->uploadImages( $params );
              $register->image = $idArray[0];
          }
          $register->save();

          $order = new Banner1();
          $orderEdit = $order->find($register->id);
          $orderEdit->order = $register->id;
          $orderEdit->save();

        return true;
    }



    private function delete(Request $request)
    {

        $id = $request->input('id');
        $registerDelete = new Banner1();
        $delete = $registerDelete->find($id);

        if ($delete->image)
        {
            $files = new File();
            $file = $files->find($delete->image);
            $nameFileFull = $file->namefilefull;
            $nameFileFullThumb = $file->namefilefullthumb;

            if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
            if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

            $file->delete();
        }

        // Deleta a Galeria reaproveitando a função delete galerias feita no editar abaixo

        $delete->delete();
        return true;
    }



    // ================================================================================
    // ============================= Edição das casas =================================
    // ================================================================================

    public function updateBanner1(Request $request, $id = null)
    {
        $return = ['title' => 'Home / Atualizar Banner 1'];
        $erros = false;
        $firstCall = true;

        if ($request->isMethod('post'))
        {
            $firstCall = false;
            $validator = $this->validator($request);

            if (!$validator->fails())
            {
                switch ( $request->input('action') )
                {
                    case 'register':
                        $this->register($request);
                        break;
                    case 'edit':
                        $this->edit($request);
                        break;
                    case 'delete-image':
                        $this->deleteImage($request);
                        break;
                }
            }
            else
            {
              $erros = true;
            }
        }

        $banner1 = new Banner1();
        $return['banner1'] = $banner1->find($id);

        // Retorna a imagem prinpipal
        $image = new Banner1();
        $return['image'] = $image->returnaImage($id);

        if(!is_numeric($id) || !$return['banner1']->count() || !$id) {
            return redirect('/adm/home'); //Se não encontrar o registro volta para listagem
        }

        if($erros)
        {
          return view('adm.banner1-update')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.banner1-update')->withReturn($return);
          } else {
              return redirect('/adm/banner1-edit/'.$id); //Adicionado o redirect para limpar o post
          }
        }
    }

    private function order(Request $request)
    {
        $update = new Banner1();
        $edit = $update->all()->sortByDesc('order')->toArray();
        $orderNext = null;

        if( count($edit) > 1 )
        {
            for($i = 0; $i < count($edit); $i++)
            {
                if(isset($edit[$i+1]))
                {
                    $orderNext = $edit[$i+1]['order'];

                    $next = $update->find($edit[$i+1]['id']);
                    $next->order = $edit[$i]['order'];
                    $next->save();

                    $atual = $update->find($edit[$i]['id']);
                    $atual->order = $orderNext;
                    $atual->save();
                    return true;
                }
            }
        }

        return true;
    }


    private function deleteImage(Request $request)
    {

        switch ( $request->input('campo') )
        {
            case 'Image':
                $register = new Banner1();
                $delete = $register->find($request->input('id'));

                $files = new File();
                $file = $files->find($delete->image);
                $nameFileFull = $file->namefilefull;
                $nameFileFullThumb = $file->namefilefullthumb;

                if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
                if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

                $file->delete();

                $delete->image = null;
                $delete->save();
                break;
        }

        return true;

    }



    private function edit(Request $request)
    {
          $banner1 = new Banner1();
          $edit = $banner1->find($request->input('id'));
          $edit->text = $request->input('text');
          $edit->link = $request->input('link');

          $helpers = new Helpers();

          // -------------------------------------------------------------------
          // FileImageHeight
          // -------------------------------------------------------------------
          if (count($request->file('file')))
          {
              if ($edit->image)
              {
                  // Deleta imagem existente
                  $files = new File();
                  $file = $files->find($edit->image);
                  $nameFileFull = $file->namefilefull;
                  $nameFileFullThumb = $file->namefilefullthumb;

                  if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
                  if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

                  $file->delete();
              }

              $params = [
                  'files' => $request->file('file'),
                  'model' => 'File',
                  'thumb' => true,
                  'path' => 'images/_Banner1',
                  'pathThumb' => 'images/_Banner1/_Thumbs'
              ];
              $idArray = $helpers->uploadImages( $params );
              $edit->image = $idArray[0];
          }
          $edit->save();


        return true;
    }

}
