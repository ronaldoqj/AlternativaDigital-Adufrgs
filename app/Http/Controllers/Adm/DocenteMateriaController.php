<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocenteMateria;
use App\Models\DocenteAutor;
use App\Models\File;
use App\Models\FilesGaleria;
use App\Models\GaleriaHasFileGaleria;
use Classes\Helpers;
use Validator;
use DB;

class DocenteMateriaController extends Controller
{
    private $msgErros = '';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id = null)
    {
        $return = ['title' => 'DOCENTE / Matéria'];
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

        $materia = new DocenteMateria();
        $return['materias'] = $materia->listMaterias();
        $docenteAutores = new DocenteAutor();
        $return['docenteAutores'] = $docenteAutores->listDocenteAutor();
        if($erros)
        {
          return view('adm.docente-materia')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.docente-materia')->withReturn($return);
          } else {
              return redirect('/adm/docente/materia'); //Adicionado o redirect para limpar o post
          }
        }

    }

    private function validator($request)
    {
        switch ( $request->input('action') )
        {
            case 'register':
                $rules = [
                    'assunto' => 'nullable|max:240',
                    'title' => 'required|max:240',
                    'subtitle' => 'nullable|max:240',
                    'legendaImagem' => 'nullable|max:240',
                    'fileImagemPrincipal.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
                    'filesGaleria.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
                    'site' => 'nullable|max:240',
                    'facebook' => 'nullable|max:240',
                    'twitter' => 'nullable|max:240',
                    'instagram' => 'nullable|max:240',
                    'flickr' => 'nullable|max:240',
                ];
                $messages = [
                    'assunto.max' => 'Campo assunto não pode ter mais do que 240 caracteres.',
                    'title.required' => 'Campo título é obrigatório.',
                    'title.max' => 'Campo titulo não pode ter mais do que 240 caracteres.',
                    'subtitle.max' => 'Campo sub-titulo não pode ter mais do que 240 caracteres.',
                    'legendaImagem.max' => 'Campo legenda da imagem não pode ter mais do que 240 caracteres.',
                    'fileImagemPrincipal.*.image' => 'Para o campo Imagem Principal só é permitido arquivos do tipo imagem.',
                    'fileImagemPrincipal.*.dimensions' => 'Para a Imagem Principal a imagem não pode ser de dimensões inferiores que 100x100.',
                    'filesGaleria.*.image' => 'Para o campo Galeria só é permitido arquivos do tipo imagem.',
                    'filesGaleria.*.dimensions' => 'Para a Galeria as imagens não pode ser de dimensões inferiores que 100x100.',
                    'namedefault.max' => 'Campo nome padrão não pode ter mais do que 140 caracteres.',
                    'site.max' => 'Campo site não pode ter mais do que 240 caracteres.',
                    'facebook.max' => 'Campo Facebook não pode ter mais do que 240 caracteres.',
                    'twitter.max' => 'Campo Twiiter não pode ter mais do que 240 caracteres.',
                    'instagram.max' => 'Campo Instagram não pode ter mais do que 240 caracteres.',
                    'flickr.max' => 'Campo Flickr não pode ter mais do que 240 caracteres.',
                ];
                break;
            case 'edit':
                $rules = [
                    'id' => 'required',
                    'assunto' => 'nullable|max:240',
                    'title' => 'required|max:240',
                    'subtitle' => 'nullable|max:240',
                    'legendaImagem' => 'nullable|max:240',
                    'fileImagemPrincipal.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
                    'filesGaleria.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
                    'site' => 'nullable|max:240',
                    'facebook' => 'nullable|max:240',
                    'twitter' => 'nullable|max:240',
                    'instagram' => 'nullable|max:240',
                    'flickr' => 'nullable|max:240',
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado.',
                    'assunto.max' => 'Campo assunto não pode ter mais do que 240 caracteres.',
                    'title.required' => 'Campo título é obrigatório.',
                    'title.max' => 'Campo titulo não pode ter mais do que 240 caracteres.',
                    'subtitle.max' => 'Campo sub-titulo não pode ter mais do que 240 caracteres.',
                    'legendaImagem.max' => 'Campo legenda da imagem não pode ter mais do que 240 caracteres.',
                    'fileImagemPrincipal.*.image' => 'Para o campo Imagem Principal só é permitido arquivos do tipo imagem.',
                    'fileImagemPrincipal.*.dimensions' => 'Para a Imagem Principal a imagem não pode ser de dimensões inferiores que 100x100.',
                    'filesGaleria.*.image' => 'Para o campo Galeria só é permitido arquivos do tipo imagem.',
                    'filesGaleria.*.dimensions' => 'Para a Galeria as imagens não pode ser de dimensões inferiores que 100x100.',
                    'namedefault.max' => 'Campo nome padrão não pode ter mais do que 140 caracteres.',
                    'site.max' => 'Campo site não pode ter mais do que 240 caracteres.',
                    'facebook.max' => 'Campo Facebook não pode ter mais do que 240 caracteres.',
                    'twitter.max' => 'Campo Twiiter não pode ter mais do que 240 caracteres.',
                    'instagram.max' => 'Campo Instagram não pode ter mais do que 240 caracteres.',
                    'flickr.max' => 'Campo Flickr não pode ter mais do que 240 caracteres.',
                ];
                break;
            case 'delete':
                $rules = [
                    'idMateria' => 'required'
                ];
                $messages = [
                    'idMateria.required' => 'Nenhum registro informado!'
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
            case 'order-image-galeria':
                $rules = [ 'id' => 'required' ];
                $messages = [ 'id.required' => 'Nenhum registro informado!' ];
                break;
            case 'edit-image-galeria':
                $rules = [
                    'id' => 'required',
                    'name' => 'required|max:140',
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!',
                    'name.required' => 'Campo nome da imagem é obrigatório.',
                    'name.max' => 'Nome da imagem não pode ter mais do que 140 caracteres.',
                ];
                break;
            case 'delete-image-galeria':
                $rules = [
                    'id' => 'required',
                    'idMateria' => 'required',
                ];
                $messages = [
                    'id.required' => 'Não foi possível identificar o registro!',
                    'idMateria.required' => 'Não foi possível identificar o arquivo a ser excluído!',
                ];
                break;
            case 'delete-galeria':
                $rules = [
                    'idMateria' => 'required',
                ];
                $messages = [
                    'idMateria.required' => 'Não foi possível identificar a galeria a ser excluída!',
                ];
                break;
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        return $validator;
    }


    private function register(Request $request)
    {
          $register = new DocenteMateria();
          $register->autor = $request->input('autor');
          $register->assunto = $request->input('assunto');
          $register->title = $request->input('title');
          $register->subtitle = $request->input('subtitle');
          // $register->title_banner = $request->input('title_banner');
          // $register->legenda_banner = $request->input('legendaBanner');
          $register->legenda_imagem = $request->input('legendaImagem');
          $register->texto = $request->input('texto');
          $register->texto2 = $request->input('texto2');
          $register->video = $request->input('video');
          $register->site = $request->input('site');
          $register->facebook = $request->input('facebook');
          $register->twitter = $request->input('twitter');
          $register->instagram = $request->input('instagram');
          $register->flickr = $request->input('flickr');

          $helpers = new Helpers();

          // -------------------------------------------------------------------
          // FileBannerPrincipal
          // -------------------------------------------------------------------
          // if (count($request->file('fileBannerPrincipal')))
          // {
          //     $params = [
          //         'files' => $request->file('fileBannerPrincipal'),
          //         'model' => 'File',
          //         'thumb' => true,
          //         'path' => 'images/_BannerPrincipal',
          //         'pathThumb' => 'images/_BannerPrincipal/_Thumbs'
          //     ];
          //     $idArray = $helpers->uploadImages( $params );
          //     $materia->banner_principal = $idArray[0];
          // }
          // -------------------------------------------------------------------
          // FileImagemPrincipal
          // -------------------------------------------------------------------
          if (count($request->file('fileImagemPrincipal')))
          {
              $params = [
                  'files' => $request->file('fileImagemPrincipal'),
                  'model' => 'File',
                  'thumb' => true,
                  'path' => 'images/_DocenteMateria/_ImagemPrincipal',
                  'pathThumb' => 'images/_DocenteMateria/_ImagemPrincipal/_Thumbs'
              ];
              $idArray = $helpers->uploadImages( $params );
              $register->imagem_principal = $idArray[0];
          }
          $register->save();

          $order = new DocenteMateria();
          $orderEdit = $order->find($register->id);
          $orderEdit->order = $register->id;
          $orderEdit->save();
          // -------------------------------------------------------------------
          // Categorias
          // -------------------------------------------------------------------
          // $categoriasArray = [];
          // if ($request->input('categorias')) { $categoriasArray = explode(",", $request->input('categorias')); }
          //
          // if (count($categoriasArray))
          // {
          //     foreach ($categoriasArray as $item)
          //     {
          //         $materiasHasCategoria = new MateriaHasCategoria();
          //         $materiasHasCategoria->id_materia = $materia->id;
          //         $materiasHasCategoria->id_categoria = $item;
          //         $materiasHasCategoria->save();
          //     }
          // }


          // -------------------------------------------------------------------
          // Galerias
          // -------------------------------------------------------------------
          if (count($request->file('filesGaleria')))
          {
              $params = [
                  'files' => $request->file('filesGaleria'),
                  'model' => 'FilesGaleria',
                  'thumb' => true,
                  'path' => 'images/_Galeria',
                  'pathThumb' => 'images/_Galeria/_Thumbs',
                  'namedefault' => $request->input('namedefault')
              ];
              $idArray = $helpers->uploadImages( $params );
              foreach ($idArray as $item)
              {
                  $galeriaHasImagem = new GaleriaHasFileGaleria();
                  $idOrder = 0;

                  if ($galeriaHasImagem->where('id_materia', '!=', '')->max('order')) {
                      $idOrder = $galeriaHasImagem->where('id_materia', '!=', '')->max('order');
                  }
                  $idOrder++;

                  $galeriaHasImagem->id_materia = $register->id;
                  $galeriaHasImagem->id_file = $item;
                  $galeriaHasImagem->order = $idOrder;
                  $galeriaHasImagem->save();
              }
          }

        return true;
    }

    private function delete(Request $request)
    {
        $id = $request->input('idMateria');
        // $materiasHasCategoria = new MateriaHasCategoria();
        // $materiasCategorias = $materiasHasCategoria->where('id_materia', '=', $id);
        // $materiasCategorias->delete();
        $registerDelete = new DocenteMateria();
        $delete = $registerDelete->find($id);

        // if ($delete->banner_principal)
        // {
        //     $files = new File();
        //     $file = $files->find($delete->banner_principal);
        //     $nameFileFull = $file->namefilefull;
        //     $nameFileFullThumb = $file->namefilefullthumb;
        //
        //     if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
        //     if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }
        //
        //     $file->delete();
        // }
        if ($delete->imagem_principal)
        {
            $files = new File();
            $file = $files->find($delete->imagem_principal);
            $nameFileFull = $file->namefilefull;
            $nameFileFullThumb = $file->namefilefullthumb;

            if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
            if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

            $file->delete();
        }

        // Deleta a Galeria reaproveitando a função delete galerias feita no editar abaixo
        $this->deleteGaleria($request);

        $delete->delete();
        return true;
    }







    // ================================================================================
    // ========================== Edição das noticias =================================
    // ================================================================================


    public function update(Request $request, $id = null)
    {
        $return = ['title' => 'DOCENTE / Atualizar Matérias'];
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
                    case 'order-image-galeria':
                        $this->orderImage($request);
                        break;
                    case 'edit-image-galeria':
                        $this->editImageGaleria($request);
                        break;
                    case 'delete-image-galeria':
                        $this->deleteImageGaleria($request);
                        break;
                    case 'delete-galeria':
                        $this->deleteGaleria($request);
                        break;
                }
            }
            else
            {
              $erros = true;
            }
        }

        // $categoria = new Categoria();
        // $return['categorias'] = $categoria->all();

        $materia = new DocenteMateria();
        $return['materia'] = $materia->find($id);

        $docenteAutores = new DocenteAutor();
        $return['docenteAutores'] = $docenteAutores->listDocenteAutor();

        // Retorna as categorias cadastradas
        // $materiaCategorias = new MateriaHasCategoria();
        // $return['noticiaCategorias'] = $materiaCategorias->where('id_materia', '=', $id)->get();

        // Retorna a banner prinpipal
        // $bannerPrincipal = new DocenteMateria();
        // $return['bannerPrincipal'] = $bannerPrincipal->returnaBannerPrincipal($id);

        // Retorna a imagem prinpipal
        $imagemPrincipal = new DocenteMateria();
        $return['imagemPrincipal'] = $imagemPrincipal->returnImagemPrincipal($id);

        // Retorna a galeria
        $galeria = new GaleriaHasFileGaleria();
        $return['galeria'] = $galeria->listGaleriaADM($id, 'galerias_has_files-galeria.id_materia');

        if(!count($return['materia']) || !$id) {
            return redirect('/adm/docente/materia'); //Se não encontrar o registro volta para listagem
        }

        if($erros)
        {
          return view('adm.docente-materia-update')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.docente-materia-update')->withReturn($return);
          } else {
              return redirect('/adm/docente/materia-edit/'.$id); //Adicionado o redirect para limpar o post
          }
        }
    }



    private function orderImage(Request $request)
    {
      $trueFalse = true;
      $update = new GaleriaHasFileGaleria();
      $edit = $update->where('id_materia', '=', $request->input('idMateria'))->orderBy('order')->get()->toArray();
      $id = $request->input('id');
      $orderNext = null;
      if( count($edit) > 1 )
      {
          for($i = 0; $i < count($edit); $i++)
          {
              if(isset($edit[$i+1]))
              {
                  if($edit[$i+1]['id'] == $id)
                  {
                      $orderNext = $edit[$i+1]['order'];

                      $next = $update->find($edit[$i+1]['id']);
                      $next->order = $edit[$i]['order'];
                      $next->save();

                      $atual = $update->find($edit[$i]['id']);
                      $atual->order = $orderNext;
                      $atual->save();
                  }
              }
          }
      }

      return $trueFalse;
    }

    private function editImageGaleria(Request $request)
    {
        $update = new FilesGaleria();
        $edit = $update->find($request->input('id'));
        $edit->name = $request->input('name');

        $edit->save();

        return true;
    }

    private function deleteGaleria(Request $request)
    {
        $idMateria = $request->input('idMateria');

        $hasImagem = new GaleriaHasFileGaleria();
        $deleteHasImagem = $hasImagem->where('id_materia', $idMateria);

        if ($deleteHasImagem->get()->toArray())
        {
            $arrayIds = [];
            foreach ($deleteHasImagem->get() as $idsImages)
            {
                $arrayIds[] = $idsImages->id_file;
            }

            $file = new FilesGaleria();
            $deleteFiles = $file->wherein('id', $arrayIds);

            foreach ($deleteFiles->get() as $itemFile)
            {
                if ( file_exists($itemFile->namefilefullthumb) )
                {
                    unlink($itemFile->namefilefullthumb);
                    unlink($itemFile->namefilefull);
                }
            }

            $deleteFiles->delete();
            $deleteHasImagem->delete();
        }

        return true;
    }

    private function deleteImageGaleria(Request $request)
    {
        $id = $request->input('id');
        $idMateria = $request->input('idMateria');

        $hasImagem = new GaleriaHasFileGaleria();
        $deleteHasImagem = $hasImagem->where('id_materia', $idMateria)->where('id', $id)->first();

        if ($deleteHasImagem)
        {
            $file = new FilesGaleria();
            $deleteFile = $file->find($id);

            if ( file_exists($deleteFile->namefilefullthumb) ) {
                $deleteFile->delete();
                $deleteHasImagem->delete();
                unlink($deleteFile->namefilefullthumb);
                unlink($deleteFile->namefilefull);
            }
        }

        return true;
    }

    private function deleteImage(Request $request)
    {

        switch ( $request->input('campo') )
        {
            // case 'BannerPrincipal':
            //     $register = new DocenteMateria();
            //     $delete = $register->find($request->input('id'));
            //
            //     $files = new File();
            //     $file = $files->find($delete->banner_principal);
            //     $nameFileFull = $file->namefilefull;
            //     $nameFileFullThumb = $file->namefilefullthumb;
            //
            //     if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
            //     if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }
            //
            //     $file->delete();
            //
            //     $delete->banner_principal = null;
            //     $delete->save();
            //
            //     break;
            case 'ImagemPrincipal':
                $register = new DocenteMateria();
                $delete = $register->find($request->input('id'));

                $files = new File();
                $file = $files->find($delete->imagem_principal);
                $nameFileFull = $file->namefilefull;
                $nameFileFullThumb = $file->namefilefullthumb;

                if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
                if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

                $file->delete();

                $delete->imagem_principal = null;
                $delete->save();
                break;
        }

        return true;

    }



    private function edit(Request $request)
    {
          $registers = new DocenteMateria();
          $register = $registers->find($request->input('id'));
          $register->autor = $request->input('autor');
          $register->assunto = $request->input('assunto');
          $register->title = $request->input('title');
          $register->subtitle = $request->input('subtitle');
          $register->legenda_imagem = $request->input('legendaImagem');
          $register->texto = $request->input('texto');
          $register->texto2 = $request->input('texto2');
          $register->video = $request->input('video');
          $register->site = $request->input('site');
          $register->facebook = $request->input('facebook');
          $register->twitter = $request->input('twitter');
          $register->instagram = $request->input('instagram');
          $register->flickr = $request->input('flickr');

          $helpers = new Helpers();

          // -------------------------------------------------------------------
          // FileBannerPrincipal
          // -------------------------------------------------------------------
          // if (count($request->file('fileBannerPrincipal')))
          // {
              // if ($materia->banner_principal)
              // {
              //     // Deleta imagem existente
              //     $files = new File();
              //     $file = $files->find($materia->banner_principal);
              //     $nameFileFull = $file->namefilefull;
              //     $nameFileFullThumb = $file->namefilefullthumb;
              //
              //     if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
              //     if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }
              //
              //     $file->delete();
              // }
              //
              // // Adiciona nova imagem
              // $params = [
              //   'files' => $request->file('fileBannerPrincipal'),
              //   'model' => 'File',
              //   'thumb' => true,
              //   'path' => 'images/_BannerPrincipal',
              //   'pathThumb' => 'images/_BannerPrincipal/_Thumbs'
              // ];
              // $idArray = $helpers->uploadImages( $params );
              // $materia->banner_principal = $idArray[0];
          // }
          // -------------------------------------------------------------------
          // FileImagemPrincipal
          // -------------------------------------------------------------------
          if (count($request->file('fileImagemPrincipal')))
          {
              if ($register->imagem_principal)
              {
                  // Deleta imagem existente
                  $files = new File();
                  $file = $files->find($register->imagem_principal);
                  $nameFileFull = $file->namefilefull;
                  $nameFileFullThumb = $file->namefilefullthumb;

                  if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
                  if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

                  $file->delete();
              }

              $params = [
                  'files' => $request->file('fileImagemPrincipal'),
                  'model' => 'File',
                  'thumb' => true,
                  'path' => 'images/_DocenteMateria/_ImagemPrincipal',
                  'pathThumb' => 'images/_DocenteMateria/_ImagemPrincipal/_Thumbs'
              ];
              $idArray = $helpers->uploadImages( $params );
              $register->imagem_principal = $idArray[0];
          }
          $register->save();

          // // -------------------------------------------------------------------
          // // Categorias
          // // -------------------------------------------------------------------
          // $DCHC = new MateriaHasCategoria();
          // $DeleteDCHC = $DCHC->where('id_materia', $materia->id);
          // $DeleteDCHC->delete();
          //
          // $categoriasArray = [];
          // if ($request->input('categorias')) { $categoriasArray = explode(",", $request->input('categorias')); }
          //
          // if (count($categoriasArray))
          // {
          //     foreach ($categoriasArray as $item)
          //     {
          //         $materiasHasCategoria = new MateriaHasCategoria();
          //         $materiasHasCategoria->id_materia = $materia->id;
          //         $materiasHasCategoria->id_categoria = $item;
          //         $materiasHasCategoria->save();
          //     }
          // }


          // -------------------------------------------------------------------
          // Galerias
          // -------------------------------------------------------------------
          if (count($request->file('filesGaleria')))
          {
              $params = [
                  'files' => $request->file('filesGaleria'),
                  'model' => 'FilesGaleria',
                  'thumb' => true,
                  'path' => 'images/_Galeria',
                  'pathThumb' => 'images/_Galeria/_Thumbs',
                  'namedefault' => $request->input('namedefault')
              ];
              $idArray = $helpers->uploadImages( $params );
              foreach ($idArray as $item)
              {
                  $galeriaHasImagem = new GaleriaHasFileGaleria();
                  $idOrder = 0;

                  if ($galeriaHasImagem->where('id_materia', '!=', '')->max('order')) {
                      $idOrder = $galeriaHasImagem->where('id_materia', '!=', '')->max('order');
                  }
                  $idOrder++;

                  $galeriaHasImagem->id_materia = $register->id;
                  $galeriaHasImagem->id_file = $item;
                  $galeriaHasImagem->order = $idOrder;
                  $galeriaHasImagem->save();
              }
          }

        return true;
    }

}
