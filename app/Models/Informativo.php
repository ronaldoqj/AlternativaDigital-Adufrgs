<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use DB;

class Informativo extends Model
{
  public function listInformativo($params = [])
  {
      $params['sort'] = $params['sort'] ?? false;
      $params['limit'] = $params['limit'] ?? false;

      $list = DB::table('informativos');
      $list->leftjoin('files as arquivo', 'arquivo.id', '=', 'informativos.arquivo');

      if ($params['sort']) { $list->inRandomOrder(); }
      if ($params['limit']) { $list->take($params['limit']); }
        else { $list->orderBy('informativos.order', 'asc'); }

      $listAll = $list->addSelect('informativos.*',
                                  'informativos.id as id',

                                  'arquivo.id as arquivo_id',
                                  'arquivo.name as arquivo_name',
                                  'arquivo.description as arquivo_description',
                                  'arquivo.alternative_text as arquivo_alternative_text',
                                  'arquivo.path as arquivo_path',
                                  'arquivo.namefile as arquivo_namefile',
                                  'arquivo.namefilefull as arquivo_namefilefull'
                                  )->get();
       return $listAll;
  }

  public function returnFile($id)
  {
      $list = DB::table('informativos')->join('files', 'files.id', '=', 'informativos.arquivo')
                                ->where('informativos.id', $id);

      $return = $list->addSelect('informativos.*',
                                  'informativos.id as id',

                                  'files.id as arquivo_id',
                                  'files.name as arquivo_name',
                                  'files.description as arquivo_description',
                                  'files.alternative_text as arquivo_alternative_text',
                                  'files.path as arquivo_path',
                                  'files.namefile as arquivo_namefile',
                                  'files.namefilefull as arquivo_namefilefull'
                                  )->get();
       return $return;
  }
}
