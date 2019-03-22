<?php

class BaseController extends Controller {
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// debug([
		// 	'Auth::user()'=>Auth::user(),
		// 	'Session::get(user)'=>Session::get('user')
		// ]);

		if(Auth::user()) {
			Input::merge(['ID_USUARIO_LOGADO' => Auth::user()->usu_id]);
			Input::merge(['NOME_USUARIO_LOGADO' => Auth::user()->usu_nome]);
		}
	}

	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
