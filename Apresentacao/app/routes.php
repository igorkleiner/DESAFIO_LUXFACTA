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
	Route::get('/',                array('as'=> 'produtos',                'uses' => 'ProdutoController@produto'));
	//{{Route('produto.produto')}}
	Route::post('/salvar',         array('as'=> 'produtos.salvar',         'uses' => 'ProdutoController@salvarProduto'));
	//{{Route('salvar.salvar')}}
	Route::post('/excluir',        array('as'=> 'produtos.excluir',        'uses' => 'ProdutoController@excluirProduto'));
	//{{Route('excluir.excluir')}}
	Route::any('/usuario',         array('as'=> 'usuarios',                'uses' => 'UsuarioController@usuario'));
	//{{Route('usuario.usuario')}}
	Route::post('/salvacadastro',  array('as'=> 'usuarios.salvacadastro',  'uses' => 'UsuarioController@salvarUsuario'));
	//{{Route('salvacadastro.salvacadastro')}}
	Route::post('/excluicadastro', array('as'=> 'usuarios.excluicadastro', 'uses' => 'UsuarioController@excluirUsuario'));
	//{{Route('salvacadastro.salvacadastro')}}
	Route::post('/makeLogin',      array('as'=>'makeLogin',                'uses'=>'LoginController@makeLogin'));
	//{{Route(igor.makeLogin) }}
	Route::post('/logout',         array('as'=>'logout',                   'uses'=>'LoginController@logout'));
	//{{Route(igor.logout) }}
	Route::any('/workLoger',       array('as'=>'workLoger',                'uses'=>'WorkController@workLoger'));
	//{{Route(igor.teste) }}
	Route::post('/salvarTimer',    array('as'=>'salvar.timer',             'uses'=>'WorkController@salvarTimer'));
	//{{Route(salvar.timer) }}
	Route::any('/grafico',         array('as'=>'grafico',                  'uses'=>'WorkController@graficoHoras'));
	//{{Route(usuario.grafico) }}
