<?php

class ProdutoController extends BaseController 
{
	public function produto()
	{
		return View::make('produto.listar_produto')
			->with('dados', MakeRequest::callService_api('ProdutoService', 'listar'))
			->with('usuario',Auth::user());
	}

	public function salvarProduto()
	{
		return json_encode(MakeRequest::callService_api('ProdutoService', 'salvar', Input::all()));
	}

	public function excluirProduto()
	{
		return json_encode(MakeRequest::callService_api('ProdutoService', 'excluir', Input::all()));
	}
}
