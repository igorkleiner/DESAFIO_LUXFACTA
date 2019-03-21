<?php

class BaseController extends Controller {
	protected $nome = null;
	protected $date = null;
	protected $hora = null;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function __construct()
	{
		if(Auth::user()) Input::merge(['ID_USUARIO_LOGADO' => Auth::user()->usu_id]);
		$this->nome = Auth::user()->usu_nome;
		$this->date = date('d-m-Y',time());
		$this->hora = date('H:i:s',time());
	}

	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
