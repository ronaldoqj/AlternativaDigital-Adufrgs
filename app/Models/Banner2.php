<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use DB;

class Banner2 extends Model
{
    protected $table = 'banner2';
    public function listBanner2()
    {
        $list = DB::table('banner2')->leftjoin('files as image', 'image.id', '=', 'banner2.image')
                                       ->orderBy('banner2.order', 'asc');

        $listAll = $list->addSelect('banner2.*',
                                    'banner2.id as id',

                                    'image.id as image_id',
                                    'image.name as image_name',
                                    'image.description as image_description',
                                    'image.alternative_text as image_alternative_text',
                                    'image.path as image_path',
                                    'image.namefile as image_namefile',
                                    'image.namefilefull as image_namefilefull',
                                    'image.paththumb as image_paththumb',
                                    'image.namefilethumb as image_namefilethumb',
                                    'image.namefilefullthumb as image_namefilefullthumb'
                                    )->get();
         return $listAll;
    }

    public function returnaImage($id)
    {
        $list = DB::table('banner2')->join('files', 'files.id', '=', 'banner2.image')
                                  ->where('banner2.id', $id);

        $return = $list->addSelect('banner2.*',
                                    'banner2.id as id',

                                    'files.id as image_id',
                                    'files.name as image_name',
                                    'files.description as image_description',
                                    'files.alternative_text as image_alternative_text',
                                    'files.path as image_path',
                                    'files.namefile as image_namefile',
                                    'files.namefilefull as image_namefilefull',
                                    'files.paththumb as image_paththumb',
                                    'files.namefilethumb as image_namefilethumb',
                                    'files.namefilefullthumb as image_namefilefullthumb')->get();
         return $return;
    }

}
