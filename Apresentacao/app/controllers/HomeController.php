<?php

class HomeController extends BaseController 
{
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function api()
	{
		// debug(['Input::all() no controler'=>Input::all()]);
		return InterceptorHandler::interceptService(Input::all());
	}

	public function makeLogin()
	{
		return $this->validarLogin(Input::all());
	}

	public function validarLogin($data)
	{
		if(empty($data['usu_login']) || empty($data['usu_password']))
		{
			throw new Exception("Dados inválidos para login");
		}
		$usuario = MakeRequest::callService_api('LoginService','getUser',$data);
		// debug([
		// 	'validarLogin'=>$data,
		// 	'usuario'=>$usuario
		// ]);
				
		if(!$usuario->response)
		{
			throw new Exception("Login ou senha incorretos.");
		}
		else
		{
			$this->login($usuario->response);
		}
						
		if(Auth::user())
		{
			Log::info("<<< ".Auth::user()->usu_nome.": Login efetuado com sucesso. >>>");
			return json_encode(['status'=>1]);
		}
		else
		{
			Log::info("<<< ".$t->usu_nome."Login NAO efetuado... TENTE NOVAMENTE >>>");
			return json_encode(['status'=>0]);
		}		
	}

	public function login($usuario)
	{
		// debug([$usuario['attibutes']]);
		try
		{
			$t               = new UsuarioMakeLogin;
			$t->usu_id       = $usuario->usu_id;
			$t->usu_nome     = $usuario->usu_nome;
			$t->per_id       = $usuario->per_id;
			$t->usu_login    = $usuario->usu_login;
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

	public function logout()
	{
		Session::flush();
		Log::info("<<< ".Auth::user()->usu_nome.": Logout efetuado >>>");		
		return json_encode(['status'=>1]);
	}

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
	
	public function timeControl()
	{
		return View::make('timer.time_Control')
			->with('usuario',Auth::user())
			->with('time', MakeRequest::callService_api('TimerService', 'listarHoje'));
	}

	public function salvarTimer()
	{
		return json_encode(MakeRequest::callService_api('TimerService', 'salvar', Input::all()));
	}

	public function workLoger()
	{
		return View::make('timer.workLoger')
			->with('usuario',Auth::user())
			->with('time', MakeRequest::callService_api('TimerService', 'listarHoje'));
	}

	public function graficoHoras()
	{
		return View::make('timer.grafico')
			->with('usuario',Auth::user())
			->with('grafico', MakeRequest::callService_api('TimerService', 'minhasHoras'));
	}
}
