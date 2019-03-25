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
		return json_encode(MakeRequest::callService('LoginService', 'validarLogin', Input::all()));
	}

	public function logout()
	{
		return json_encode(MakeRequest::callService('LoginService', 'logout', Input::all()));
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
