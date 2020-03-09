<?php

use  Pitbulk\Saml2\Saml2Auth;
use  Pitbulk\Saml2\Saml2User;
use Illuminate\Http\Request;

class LoginController extends BaseController 
{
private $request = null;
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

	public function __construct(Request $request){

		$this->request = $request;

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
		// Auth::logout();
		Session::flush();
		Log::info("<<< ".Auth::user()->usu_nome.": Logout efetuado >>>");		
		return json_encode(['status'=>1]);
	}

	public function samlLogin($user)
	{
		debug(['$user'=>$user]);
		return; //json_encode(['status'=>1]);
	}

	public function debugar(){
		debug($this->request);
		return ['status'=>'OK'];
	}

	
}
