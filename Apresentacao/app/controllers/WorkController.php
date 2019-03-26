<?php

class WorkController extends BaseController 
{
	public function salvarTimer()
	{
		return json_encode(MakeRequest::callService_api('WorkService', 'salvar', Input::all()));
	}

	public function workLoger()
	{
		return View::make('timer.workLoger')
			->with('usuario',Auth::user())
			->with('time', MakeRequest::callService_api('WorkService', 'listarHoje'));
	}

	public function graficoHoras()
	{
		return View::make('timer.grafico')
			->with('usuario',Auth::user())
			->with('grafico', MakeRequest::callService_api('WorkService', 'minhasHoras'));
	}
}