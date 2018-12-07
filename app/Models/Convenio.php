<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use DB;

class Convenio extends Model
{
    private $type = null;
    private $limit = null;
    private $id = null;

    public function setType($type) {
        $this->type = $type;
    }
    public function setLimit($limit) {
        $this->limit = $limit;
    }
    public function setId($id) {
        $this->id = $id;
    }

    // ADM
    public function listConvenios()
    {
        $list = DB::table('convenios')->join('convenios_categorias as categoria', 'categoria.id', '=', 'convenios.categoria')
                                    ->leftjoin('files', 'files.id', '=', 'categoria.image')
                                    ->orderBy('convenios.name', 'desc');

        $listAll = $list->addSelect('convenios.id as id',
                                    'convenios.ativo as ativo',
                                    'convenios.name as name',
                                    'convenios.categoria as categoria',
                                    'convenios.description as description',
                                    'convenios.endereco as endereco',
                                    'convenios.fone as fone',
                                    'convenios.email as email',
                                    'convenios.site as site',
                                    'files.id as file_id',
                                    'files.name as categoria_name',
                                    'files.path as categoria_path',
                                    'files.namefile as categoria_namefile',
                                    'files.namefilefull as categoria_namefilefull'
                                    )->get();
         return $listAll;
    }
    public function listConveniosAdmListagem()
    {
        $list = DB::table('convenios')->join('convenios_categorias as categoria', 'categoria.id', '=', 'convenios.categoria')
                                    ->leftjoin('files', 'files.id', '=', 'categoria.image')
                                    ->orderBy('categoria.name', 'asc')
                                    ->orderBy('convenios.name', 'asc');

        $listAll = $list->addSelect('convenios.id as id',
                                    'convenios.ativo as ativo',
                                    'convenios.name as name',
                                    'convenios.categoria as categoria',
                                    'convenios.description as description',
                                    'convenios.endereco as endereco',
                                    'convenios.fone as fone',
                                    'convenios.email as email',
                                    'convenios.site as site',
                                    'categoria.name as categoria_name_convenio',
                                    'files.id as file_id',
                                    'files.name as categoria_name',
                                    'files.path as categoria_path',
                                    'files.namefile as categoria_namefile',
                                    'files.namefilefull as categoria_namefilefull'
                                    )->get();
         return $listAll;
    }


    public function returnImagemCategoria($id)
    {
        $list = DB::table('convenios')->join('files', 'files.id', '=', 'convenios.categoria')
                                     ->where('convenios.id', $id);

        $return = $list->addSelect( 'convenios.*',
                                    'convenios.id as id',

                                    'files.id as categoria_id',
                                    'files.name as categoria_name',
                                    'files.path as categoria_path',
                                    'files.namefile as categoria_namefile',
                                    'files.namefilefull as categoria_namefilefull'
                                    )->get();
         return $return;
    }

    // Site

    public function listHomeConvenios($params = [])
    {
          $params['sort'] = $params['sort'] ?? false;
          $params['limit'] = $params['limit'] ?? false;

          $list = DB::table('convenios_categorias');
          $list->leftjoin('files', 'files.id', '=', 'convenios_categorias.image');

          if ($params['sort']) { $list->inRandomOrder(); }
          if ($params['limit']) { $list->take($params['limit']); }
            else { $list->orderBy('convenios_categorias.name', 'asc'); }

          $listAll = $list->addSelect('convenios_categorias.id as id',
                                      'convenios_categorias.name as name',
                                      'convenios_categorias.image as image',
                                      'files.namefilefull as categoria_namefilefull'
                                      )->get();
           return $listAll;
    }

}
