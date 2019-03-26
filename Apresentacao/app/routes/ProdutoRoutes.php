<?php

	Route::get('/',                array('as'=> 'produtos',         'uses' => 'ProdutoController@produto'));
	//{{Route('produtos')}}
	Route::post('/salvar',         array('as'=> 'produtos.salvar',  'uses' => 'ProdutoController@salvarProduto'));
	//{{Route('produtos.salvar')}}
	Route::post('/excluir',        array('as'=> 'produtos.excluir', 'uses' => 'ProdutoController@excluirProduto'));
	//{{Route('produtos.excluir')}}