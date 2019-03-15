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

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function home()
	{
		/*cria tela home.blade.php vinda de views\home*/

		return View::make('home.home');
	}

	public function produto()
	{
		$nome = Auth::user()->usu_nome;
		$date = date('d-m-Y',time());
		$hora = date('H:i:s:u',time());
		Log::info("<< {$nome}, at: ,{$date}, {$hora} >> called LISTAR PRODUDO blade" );		
		$result = MakeRequest::callService('ProdutoService', 'listar') ;			
		return View::make('produto.listar_produto')->with('dados',$result)->with('usuario',Auth::user());
	}

	public function salvarProduto()
	{
		$data = Input::all();		
		$result = MakeRequest::callService('ProdutoService', 'salvar', $data);		
		return json_encode($result);
	}

	public function excluirProduto()
	{
		$data = Input::all();		
		$result = MakeRequest::callService('ProdutoService', 'excluir', $data);		
		return json_encode($result);
	}

	public function usuario()
	{	
		$nome = Auth::user()->usu_nome;
		$date = date('d-m-Y',time());
		$hora = date('H:i:s:u',time());
		Log::info("<< {$nome}, at: ,{$date}, {$hora} >> called LISTAR USUARIO blade" );		
		$result = MakeRequest::callService('UsuarioService', 'listar') ;		
		return View::make('usuario.listar_usuario')->with('dados',$result)->with('usuario',Auth::user());	
	}

	public function salvarUsuario()
	{
		$data = Input::all();
		$result = MakeRequest::callService('UsuarioService', 'salvar', $data);
		return json_encode($result);
	}

	public function excluirUsuario()
	{
		$data = Input::all();
		$result = MakeRequest::callService('UsuarioService', 'excluir', $data);
		return json_encode($result);
	}
	
	public function makeLogin()
	{
		$data = Input::all();
		$result =  MakeRequest::callService('LoginService', 'validarLogin', $data);
		return json_encode($result);
	}

	public function logout()
	{
		$data = Input::all();		
		$result =  MakeRequest::callService('LoginService', 'logout', $data);
		return json_encode($result);
	}

	public function timeControl()
	{
		$data = Input::all();
		$nome = Auth::user()->usu_nome;
		$date = date('d-m-Y',time());
		$hora = date('H:i:s:u',time());
		Log::info("<< {$nome}, at: ,{$date}, {$hora} >> called TIMER blade" );
		$result = MakeRequest::callService('TimerService2', 'listarHoje2') ;
		Log::info('<< DADOS VINDOS DO BANCO: >>', $result);		
		return View::make('timer.time_Control')
							->with('usuario',Auth::user())
							->with('time', $result);
	}

	public function salvarTimer()
	{
		$data = Input::all();		
		Log::info('<< metodo salvar no controler: >>', $data);	
		$result = MakeRequest::callService('TimerService', 'salvar', $data) ;
		return json_encode($result);
	}

	public function salvarTimer2()
	{
		$data = Input::all();		
		Log::info('<< metodo salvar no controler: >>', $data);	
		$result = MakeRequest::callService('TimerService2', 'salvar2', $data) ;
		return json_encode($result);
	}

	public function teste()
	{
		$data = Input::all();
		$nome = Auth::user()->usu_nome;
		$date = date('d-m-Y',time());
		$hora = date('H:i:s:u',time());
		$true = true;
		Log::info("<< {$nome}, at: ,{$date}, {$hora} >> called TIMER blade" );
		$result = MakeRequest::callService('TimerService2', 'listarHoje2') ;
		Log::info('<< DADOS VINDOS DO BANCO: >>', $result);		
		return View::make('timer.teste')
							->with('usuario',Auth::user())
							->with('time', $result)
							->with('true',$true);
	}

	public function graficoHoras(){
		$nome = Auth::user()->usu_nome;
		$date = date('d-m-Y',time());
		$hora = date('H:i:s:u',time());
		$result = MakeRequest::callService('TimerService2', 'minhasHoras2') ;
		Log::info("<< {$nome}, at: ,{$date}, {$hora} >> called GRAFICO blade" );
		$true = true;
		return View::make('timer.grafico')
							->with('usuario',Auth::user())
							->with('grafico', $result)
							->with('true',$true);
	}
	public function login(){
		return View::make('layout.login');
	}

	/**
	 * 	=============================== METODO CHAMADO POR AJAX ===============================
	 * 	$.post(url, dados)...
	 * 	$.ajax({
	 * 		type:'POST',
	 * 		encodeType:'JSON'
	 * 		data:{
	 * 			'id':1,
	 * 			'nome':'lazarento',.
	 * 			'preco':10,
	 * 			'qtd':20
	 * 		},
	 * 		url:''
	 * 	})
	 * 	.done(function(response)){})
	 * 	.fail(function(error){})
	 * 	.always(function(done){});
	 * 	
	 * esse método recebe os daods de post da tela e retorna um objeto do tipo JSON que é recebido
	 * dentro da variavel response do .done(function(response)) da GlobalViewModel
	 * $produto = Input:all é a mesma coisa de $produto = $_POST;
	 * Input::get('<nome>') é a mesma coisa que $produto = $_POST['<nome>']
	 * @return JSON ENCODE
	 */
	
}
