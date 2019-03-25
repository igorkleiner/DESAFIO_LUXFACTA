<?php

// @author IGOR KLEINER <igor_kleiner@hotmail.com> date 03/2019

abstract class LogService
{
	/**
	* Armazena no banco de dados o log do sistema 
	* @param de entrada: [
		[usu_id]       [int]               NOT NULL,
		[usu_nome]     [varchar](45)       NOT NULL,
		[data]         [datetime2](7)      NOT NULL,
		[serviço]      [varchar](40)       NOT NULL,
		[metodo]       [varchar](40)       NOT NULL,
		[parametros]   [varchar](max)      NOT NULL,
	];

	**/
	public static  function registrarAtividade($evento)
	{
		// debug([$evento]);
		$log             = new Logger;
		$log->usu_id     = $evento['usu_id'];
		$log->usu_nome   = $evento['usu_nome'];
		$log->data       = $evento['data'];
		$log->serviço    = $evento['servico'];
		$log->metodo     = $evento['metodo'];
		$log->parametros = $evento['parametros'];
		$log->save();
	}
}


