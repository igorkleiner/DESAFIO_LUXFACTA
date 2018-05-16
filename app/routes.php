<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('before' => 'auth','prefix' => ''),function(){
	
});
	//Route::get('/cadastro'   ,   array('as' => 'home.home',                    'uses' => 'HomeController@home'));
	Route::get('/',                array('as'=> 'produto.produto',               'uses' => 'HomeController@produto'));
	//{{Route('produto.produto')}}
	Route::any('/usuario',         array('as'=> 'usuario.usuario',               'uses' => 'HomeController@usuario'));
	//{{Route('usuario.usuario')}}
	Route::post('/salvar',         array('as'=> 'salvar.salvar',                 'uses' => 'HomeController@salvarProduto'));
	//{{Route('salvar.salvar')}}
	Route::post('/excluir',        array('as'=> 'excluir.excluir',               'uses' => 'HomeController@excluirProduto'));
	//{{Route('excluir.excluir')}}
	Route::post('/salvacadastro',  array('as'=> 'salvacadastro.salvacadastro',   'uses' => 'HomeController@salvarUsuario'));
	//{{Route('salvacadastro.salvacadastro')}}
	Route::post('/excluicadastro', array('as'=> 'excluicadastro.excluicadastro', 'uses' => 'HomeController@excluirUsuario'));
	//{{Route('salvacadastro.salvacadastro')}}
	Route::post('/getusuario'  ,   array('as'=>'igor.getusuario'  ,              'uses'=>'HomeController@getUsuario'));
	//{{Route(getusuario.getusuario) }}
	Route::post('/salvausuario',   array('as'=>'igor.salvausuario',              'uses'=>'HomeController@salvaUsuario'));
	//{{Route(salvausuario.salvausuario) }}
	Route::post('/makeLogin',      array('as'=>'igor.makeLogin',                 'uses'=>'HomeController@makeLogin'));
	//{{Route(igor.makeLogin) }}
	Route::post('/logout',         array('as'=>'igor.logout',                    'uses'=>'HomeController@logout'));
	//{{Route(igor.logout) }}
	Route::any('/timeControl',     array('as'=>'igor.timer',                     'uses'=>'HomeController@timeControl'));
	//{{Route(igor.timer) }}
	Route::any('/teste',           array(/*'before'=> 'auth',*/'as'=>'igor.teste',   'uses'=>'HomeController@teste'));
	//{{Route(igor.teste) }}
	Route::post('/salvarTimer',    array('as'=>'salvar.timer',                   'uses'=>'HomeController@salvarTimer'));
	//{{Route(salvar.timer) }}
	Route::any('/logError',        array('as'=>'log.error',                      'uses'=>'HomeController@logError'));
	//{{Route(igor.erro) }}
	Route::any('/grafico',         array('as'=>'usuario.grafico',                'uses'=>'HomeController@graficoHoras'));
	//{{Route(usuario.grafico) }}
	Route::any('/login',           array('as'=>'usuario.login',                  'uses'=>'HomeController@login'));
	//{{Route(usuario.grafico) }}