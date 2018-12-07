<?php
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::any('/ajax_selectMaterias', 'WelcomeController@ajax_selectMaterias')->name('selectMaterias');

Route::get('/adverso', 'AdversoController@index')->name('adverso');
Route::get('/imprensa', function () { return view('imprensa'); });
Route::get('/contato', function () { return view('contato'); });

Route::match(['get', 'post'], '/instituicao/{id?}/{title?}', 'InstituicaoController@index')->name('instituicao');
Route::match(['get', 'post'], '/juridico', 'JuridicoController@index')->name('juridico');
Route::match(['get', 'post'], '/informativos', 'InformativosController@index')->name('informativos');
Route::match(['get', 'post'], '/area-do-associado', 'AreaDoAssociadoController@index')->name('area-do-associado');
Route::match(['get', 'post'], '/associe-se', 'AssocieSeController@index')->name('associe-se');
Route::match(['get', 'post'], '/convenios/{id?}', 'ConveniosController@index')->name('convenios');
Route::match(['get', 'post'], '/carreira-e-salarios', 'CarreiraESalariosController@index')->name('carreira-e-salarios');
Route::match(['get', 'post'], '/noticia/{id?}/{title?}', 'NoticiaController@index')->name('noticia');

// Ajaxs
Route::any('/ajax_registerNewsLetter', 'AjaxsController@ajax_registerNewsLetter')->name('ajaxRegisterNewsLetter');
Route::any('/ajax_selectNoticias/{paginacao?}/{NRegistros?}', 'AjaxsController@ajax_selectNoticias')->name('ajaxSelectNoticias');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'adm'], function () {
    Route::match(['get', 'post'], '/', 'Adm\HomeController@index')->name('adm-home');
    Route::match(['get', 'post'], '/banner1', 'Adm\HomeController@index')->name('adm-home');
    Route::match(['get', 'post'], '/home', 'Adm\HomeController@index')->name('adm-home');
    Route::match(['get', 'post'], '/banner1-edit/{id?}', 'Adm\HomeController@updateBanner1')->name('adm-banner1-edit');
    Route::match(['get', 'post'], '/banner2', 'Adm\Banner2Controller@index')->name('adm-home-banner2');
    Route::match(['get', 'post'], '/banner2-edit/{id?}', 'Adm\Banner2Controller@updateBanner2')->name('adm-banner2-edit');
    Route::match(['get', 'post'], '/docente/autor', 'Adm\DocenteAutorController@index')->name('adm-docente-autor');
    Route::match(['get', 'post'], '/docente/autor-edit/{id?}', 'Adm\DocenteAutorController@updateDocenteAutor')->name('adm-docente-autor-edit');
    Route::match(['get', 'post'], '/docente/materia/{id?}', 'Adm\DocenteMateriaController@index')->name('adm-docente-materia');
    Route::match(['get', 'post'], '/docente/materia-edit/{id?}', 'Adm\DocenteMateriaController@update')->name('adm-docente-materia-edit');

    Route::match(['get', 'post'], '/convenio/texto-topo', 'Adm\ConvenioController@textoTopo')->name('adm-convenio-texto-topo');
    Route::match(['get', 'post'], '/convenio/categorias', 'Adm\ConvenioCategoriaController@index')->name('adm-convenio-categoria');
    Route::match(['get', 'post'], '/convenio/categorias-edit/{id?}', 'Adm\ConvenioCategoriaController@update')->name('adm-convenio-categoria-edit');
    Route::match(['get', 'post'], '/convenio/convenios/{id?}', 'Adm\ConvenioController@index')->name('adm-convenio');
    Route::match(['get', 'post'], '/convenio/convenios-edit/{id?}', 'Adm\ConvenioController@update')->name('adm-convenio-edit');

    Route::match(['get', 'post'], '/instituicao/{id?}', 'Adm\InstituicaoController@index')->name('adm-instituicao');
    Route::match(['get', 'post'], '/informativos/{id?}', 'Adm\InformativoController@index')->name('adm-informativos');
    Route::match(['get', 'post'], '/informativo-edit/{id?}', 'Adm\InformativoController@update')->name('adm-informativo-edit');
    Route::match(['get', 'post'], '/juridico/{id?}', 'Adm\JuridicoController@index')->name('adm-juridico');
    Route::match(['get', 'post'], '/carreiras-e-salarios/{id?}', 'Adm\CarreirasSalariosController@index')->name('adm-carreiras-e-salarios');

    Route::match(['get', 'post'], '/associe-se', 'Adm\AssocieSeController@index')->name('adm-associe-se');
    Route::match(['get', 'post'], '/usuario', 'Adm\UserController@index')->name('adm-usuario');
});
