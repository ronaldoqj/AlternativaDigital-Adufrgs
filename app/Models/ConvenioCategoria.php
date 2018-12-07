<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use DB;

class ConvenioCategoria extends Model
{
    protected $table = 'convenios_categorias';

    public function listConvenioCategoria()
    {
        $list = DB::table('convenios_categorias')->leftjoin('files as image', 'image.id', '=', 'convenios_categorias.image')
                                       ->orderBy('convenios_categorias.name', 'asc');

        $listAll = $list->addSelect('convenios_categorias.*',
                                    'convenios_categorias.id as id',

                                    'image.id as image_id',
                                    'image.name as image_name',
                                    'image.description as image_description',
                                    'image.alternative_text as image_alternative_text',
                                    'image.path as image_path',
                                    'image.namefile as image_namefile',
                                    'image.namefilefull as image_namefilefull'
                                    )->get();
         return $listAll;
    }

    public function returnaImage($id)
    {
        $list = DB::table('convenios_categorias')->join('files', 'files.id', '=', 'convenios_categorias.image')
                                  ->where('convenios_categorias.id', $id);

        $return = $list->addSelect('convenios_categorias.*',
                                    'convenios_categorias.id as id',

                                    'files.id as image_id',
                                    'files.name as image_name',
                                    'files.description as image_description',
                                    'files.alternative_text as image_alternative_text',
                                    'files.path as image_path',
                                    'files.namefile as image_namefile',
                                    'files.namefilefull as image_namefilefull')->get();
         return $return;
    }
}
