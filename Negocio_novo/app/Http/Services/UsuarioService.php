<?php

namespace App\Http\Services;

use App\Http\Models\Usuario;

class UsuarioService
{
	public function listar()
	{
		//
		$data = array();
		$data['usuarios'] = $this->getUsuarios();
		$data['perfis'] = (new PerfilService)->listar();
		return $data;
	}

	public function salvar($data)
	{
		$usuario = !empty($data['usu_id']) 
			? Usuario::find($data['usu_id']) 
			: new Usuario;

		$usuario->usu_nome     = $data['usu_nome'];	
		$usuario->per_id       = $data['per_id'];			
		$usuario->usu_login    = $data['usu_login'];			
		$usuario->usu_password = $data['usu_password'];			
		$usuario->save();
		
		return $usuario;
	}	

	public function excluir($data)
	{
		$usuario = Usuario::find($data['usu_id']);
		$usuario->delete();
		return $usuario;
	}

	public function getUsuarios()
	{
		return Usuario::all();
	}	
}	