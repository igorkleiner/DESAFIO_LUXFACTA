<?php

class LoginService
{
	/**
	* FUNCTION DESCRIPCTIONS
	* @param array ['usuario', 'senha'];
	* @return string "sucesso"
	**/
	function validarLogin($data)
	{
		if(empty($data['usuario']) || empty($data['senha']))
		{
			throw new Exception("Dados inválidos para login");
		}
		$usuario = Usuario::where(function($q) use ($data)
			{
				$q->where('usu_login',$data['usuario']);
				$q->where('usu_password', $data['senha']);
			})
			->select(
				'usu_id',
				'usu_nome',
				'per_id'
			)
			->first();		
		if(!$usuario)
		{
			throw new Exception("Login ou senha incorretos.");
		}
		else
		{
			$this->login($usuario);
		}
						
		if(Auth::user())
		{
			Log::info("<<< ".Auth::user()->usu_nome.": Login efetuado com sucesso. >>>");
			return;
		}
		else
		{
			Log::info("<<< ".$t->usu_nome."Login NAO efetuado... TENTE NOVAMENTE >>>");
			return;
		}		
	}

	function ApiLogin($id){
		debug([
			'ApiLogin'=>$id
		]);
		$usuario = Usuario::where('usu_id', $id)->first();
		if (!empty($usuario)) {
			$this->login($usuario);
			return true;
		}
		return false;
	}

	function login($usuario)
	{
		debug([
			$usuario['attibutes']
		]);

		try
		{
			$t = new UsuarioMakeLogin;
			$t->usu_id = $usuario->usu_id;
			$t->usu_nome = $usuario->usu_nome;
			$t->per_id = $usuario->per_id;
			$t->usu_login = $usuario->usu_login;
			$t->usu_password = $usuario->usu_password;		
			Auth::login($t);
			Session::set('user',$t);
			return;
		}
		catch (Exception $error)
		{
            Log::info(' =================================================');
            Log::info(' ==========>  OCORRREU UM PROBLEMA  <=============');
            Log::info(' ===============>  INFORMACOES  <=================');
            Log::info(' =================================================');
            Log::error($error->getMessage());
            Log::error($error->getTraceAsString());
            return;
		}
	}	

	function logout($data)
	{
		Session::flush();
		Log::info("<<< ".Auth::user()->usu_nome.": Logout efetuado >>>");		
		return ;
	}	
}