<?php

class BaseController extends Controller {

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
