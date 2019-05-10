<?php

	Route::any('/usuario',         array('as'=> 'usuarios',                'uses' => 'UsuarioController@usuario'));
	//{{Route('usuarios')}}
	Route::post('/salvacadastro',  array('as'=> 'usuarios.salvacadastro',  'uses' => 'UsuarioController@salvarUsuario'));
	//{{Route('usuarios.salvacadastro')}}
	Route::post('/excluicadastro', array('as'=> 'usuarios.excluicadastro', 'uses' => 'UsuarioController@excluirUsuario'));
	//{{Route('usuarios.excluicadastro')}}
	