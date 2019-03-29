<?php

namespace App\Http\Services;

class UsuarioProdutoService
{
	public function all()
	{
		return Usu_Produto::all();
	}

	public function salvar($data)
	{
		$data->save();
		return;
	}	

	public function excluir($data)
	{
		$data->delete();
		 return;
	}

	public function editar()
	{

	}
}	