<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use DB;

class DocenteMateria extends Model
{
    private $type = null;
    private $limit = null;
    private $id = null;

    protected $table = 'docente_materia';

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
    public function listMaterias()
    {
        $list = DB::table('docente_materia')->leftjoin('files', 'files.id', '=', 'docente_materia.imagem_principal')
                                    ->orderBy('docente_materia.created_at', 'desc');

        $listAll = $list->addSelect('docente_materia.id as id',
                                    'docente_materia.ativo as ativo',
                                    'docente_materia.title as title',
                                    'docente_materia.subtitle as subtitle',
                                    'docente_materia.texto as texto',
                                    'docente_materia.texto2 as texto2',
                                    'docente_materia.video as video',
                                    'docente_materia.site as site',
                                    'docente_materia.galeria as galeria',
                                    'docente_materia.imagem_principal as image',
                                    'docente_materia.legenda_imagem as legenda_image',
                                    'docente_materia.created_at as created_at',
                                    'files.id as file_id',
                                    'files.name as file_name',
                                    'files.alternative_text as file_alternative_text',
                                    'files.path as path',
                                    'files.namefile as namefile',
                                    'files.namefilefullthumb as imagem_principal_namefilefullthumb',
                                    'files.namefilefull as imagem_principal_namefilefull')->get();
         return $listAll;
    }


    public function returnImagemPrincipal($id)
    {
        $list = DB::table('docente_materia')->join('files', 'files.id', '=', 'docente_materia.imagem_principal')
                                     ->where('docente_materia.id', $id);

        $return = $list->addSelect( 'docente_materia.*',
                                    'docente_materia.id as id',

                                    'files.id as imagem_principal_id',
                                    'files.name as imagem_principal_name',
                                    'files.description as imagem_principal_description',
                                    'files.alternative_text as imagem_principal_alternative_text',
                                    'files.path as imagem_principal_path',
                                    'files.namefile as imagem_principal_namefile',
                                    'files.namefilefull as imagem_principal_namefilefull',
                                    'files.paththumb as imagem_principal_paththumb',
                                    'files.namefilethumb as imagem_principal_namefilethumb',
                                    'files.namefilefullthumb as imagem_principal_namefilefullthumb')->get();
         return $return;
    }

    // Site
    public function listHomeMaterias($params = [])
    {
          $limit = $params['limit'] ?? -1;
          $id = $params['id'] ?? 0;

          $list = DB::table('docente_materia')->leftjoin('files', 'files.id', '=', 'docente_materia.imagem_principal')
                                              ->leftjoin('docente_autor as autor', 'autor.id', '=', 'docente_materia.autor')
                                              ->leftjoin('files as imagem_autor', 'imagem_autor.id', '=', 'autor.image')
                                              ->limit($limit)
                                              ->orderBy('docente_materia.created_at', 'desc');
          if ($id > 0) {
              $list = $list->where('docente_materia.id', $id);
          }

          $listAll = $list->addSelect('docente_materia.id as id',
                                      'docente_materia.ativo as ativo',
                                      'docente_materia.assunto as assunto',
                                      'docente_materia.title as title',
                                      'docente_materia.subtitle as subtitle',
                                      'docente_materia.texto as texto',
                                      'docente_materia.texto2 as texto2',
                                      'docente_materia.video as video',
                                      'docente_materia.site as site',
                                      'docente_materia.galeria as galeria',
                                      'docente_materia.imagem_principal as image',
                                      'docente_materia.legenda_imagem as legenda_image',
                                      'docente_materia.created_at as created_at',
                                      'files.id as file_id',
                                      'files.name as file_name',
                                      'files.alternative_text as file_alternative_text',
                                      'files.path as path',
                                      'files.namefile as namefile',
                                      'files.namefilefullthumb as imagem_principal_namefilefullthumb',
                                      'files.namefilefull as imagem_principal_namefilefull',

                                      'autor.id as autor_id',
                                      'autor.name as autor_name',
                                      'autor.profession as autor_profession',
                                      'autor.text as autor_text',
                                      'imagem_autor.id as autorImagem_id',
                                      'imagem_autor.name as autorImagem_name',
                                      'imagem_autor.alternative_text as autorImagem_alternative_text',
                                      'imagem_autor.path as autorImagem_alternative_path',
                                      'imagem_autor.namefile as autorImagem_namefile',
                                      'imagem_autor.namefilefullthumb as autorImagem_namefilefullthumb',
                                      'imagem_autor.namefilefull as autorImagem_namefilefull'
                                      )->get();
           return $listAll;
    }

}
