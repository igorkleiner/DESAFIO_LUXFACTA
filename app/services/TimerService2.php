<?php

class TimerService2
{
	public function listar()
	{		
		return Timer::all();
	}

	public function listarHoje2()
	{
		return Timer2::where('usu_id', Auth::user()->usu_id)
				->where('data', date('Ymd',time()))	
				->first();
	}

	public function salvar2($data)
	{
		$timer = !empty($data['timer_id']) 
			? Timer2::find($data['timer_id']) 
			: new Timer2;

		$timer->usu_id    = $data['usu_id'];
		$timer->data      = $data['data'];
		$timer->entrada_1 = $data['entrada_1']; 
		$timer->entrada_2 = $data['entrada_2']; 
		$timer->entrada_3 = $data['entrada_3']; 
		$timer->entrada_4 = $data['entrada_4'];
		$timer->entrada_5 = $data['entrada_5']; 
		$timer->saida_1   = $data['saida_1']; 
		$timer->saida_2   = $data['saida_2']; 
		$timer->saida_3   = $data['saida_3']; 
		$timer->saida_4   = $data['saida_4']; 
		$timer->saida_5   = $data['saida_5']; 
		$timer->save();

		return $timer;
	}

	public function minhasHoras2()
	{
		return array_reverse( DB::table('timer2')
			->where('usu_id',Auth::user()->usu_id)
			->orderBy('data', 'desc')
			->take(30)
			->get()
		);
	}
}