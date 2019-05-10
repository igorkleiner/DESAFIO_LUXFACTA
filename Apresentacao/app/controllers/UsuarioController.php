<?php

class UsuarioController extends BaseController 
{

	public function usuario()
	{	
		return View::make('usuario.listar_usuario')
			->with('dados',MakeRequest::callService_api('UsuarioService', 'listar'))
			->with('usuario',Auth::user());	
	}

	public function salvarUsuario()
	{
		return json_encode(MakeRequest::callService_api('UsuarioService', 'salvar', Input::all()));
	}

	public function excluirUsuario()
	{
		return json_encode(MakeRequest::callService_api('UsuarioService', 'excluir', Input::all()));
	}
}
