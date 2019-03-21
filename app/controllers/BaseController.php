<?php

class BaseController extends Controller {
	// private $date = date('d-m-Y',time());
	// private $hora = date('H:i:s:u',time());
	// private $nome = Auth::user()->usu_nome;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function __construct()
	{
		if(Auth::user()) Input::merge(['ID_USUARIO_LOGADO' => Auth::user()->usu_id]);
	}

	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
