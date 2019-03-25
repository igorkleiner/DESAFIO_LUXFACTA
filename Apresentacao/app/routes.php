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
// Route::group(array('before' => 'auth','prefix' => ''),function(){
	
// });
	Route::get('/',                array('as'=> 'produtos',                'uses' => 'HomeController@produto'));
	//{{Route('produto.produto')}}
	Route::post('/salvar',         array('as'=> 'produtos.salvar',         'uses' => 'HomeController@salvarProduto'));
	//{{Route('salvar.salvar')}}
	Route::post('/excluir',        array('as'=> 'produtos.excluir',        'uses' => 'HomeController@excluirProduto'));
	//{{Route('excluir.excluir')}}
	Route::any('/usuario',         array('as'=> 'usuarios',                'uses' => 'HomeController@usuario'));
	//{{Route('usuario.usuario')}}
	Route::post('/salvacadastro',  array('as'=> 'usuarios.salvacadastro',  'uses' => 'HomeController@salvarUsuario'));
	//{{Route('salvacadastro.salvacadastro')}}
	Route::post('/excluicadastro', array('as'=> 'usuarios.excluicadastro', 'uses' => 'HomeController@excluirUsuario'));
	//{{Route('salvacadastro.salvacadastro')}}
	Route::post('/makeLogin',      array('as'=>'makeLogin',                'uses'=>'HomeController@makeLogin'));
	//{{Route(igor.makeLogin) }}
	Route::post('/logout',         array('as'=>'logout',                   'uses'=>'HomeController@logout'));
	//{{Route(igor.logout) }}
	Route::any('/workLoger',       array('as'=>'workLoger',                'uses'=>'HomeController@workLoger'));
	//{{Route(igor.teste) }}
	Route::post('/salvarTimer',    array('as'=>'salvar.timer',             'uses'=>'HomeController@salvarTimer'));
	//{{Route(salvar.timer) }}
	Route::any('/grafico',         array('as'=>'grafico',                  'uses'=>'HomeController@graficoHoras'));
	//{{Route(usuario.grafico) }}
