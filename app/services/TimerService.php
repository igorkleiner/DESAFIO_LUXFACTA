<?php

class TimerService
{
	public function listar()
	{		
		return Timer::all();
	}

	public function listarHoje()
	{
		$key['timer_key'] = Auth::user()->usu_id.Auth::user()->per_id.date('Ymd',time());
		Log::info('<< FAZENDO A BUSCA COM:   >>',$key);
		$data = Timer::where('timer_key', $key['timer_key'])->first();		
		return $data;
	}

	public function salvar($data)
	{
		$timer = !empty($data['timer_id']) ? Timer::find($data['timer_id']) : new Timer;

		$timer->usu_id    = $data['usu_id'];
		$timer->data      = $data['data'];
		$timer->timer_key = $data['timer_key'];
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

	public function minhasHoras(){
		$horas =  DB::table('timer')
			->where('usu_id',Auth::user()->usu_id)
			->orderBy('timer_id', 'desc')
			->take(30)
			->get();
		return array_reverse($horas);
	}
}