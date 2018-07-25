<?php

// @author IGOR KLEINER <igor_kleiner@hotmail.com> date 10/2016


abstract class MakeRequest
{
	public static function callService($class, $method, array $data = array()) /*array $data = array()*/
	{
		$data['USUARIO_LOGADO'] = Auth::user();
		$timeStart = microtime(true);
		$content = null;
		DB::transaction(function() use ($class, $method, $data, $timeStart, &$content)
		{
			try
			{
				$tmpClass = new $class;
				$result = $tmpClass->$method($data);
				$content = ['status'=> 1, 'response'=>$result];
				Log::info("'Service@Method: '".$class."@".$method ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
			}

			catch (Exception $error)
			{
				$content = ['status' => 0, 'message' => 'Ocorreu um erro no sistema. Por favor, contate o administrador.'];
                
                Log::info(' =================================================');
                Log::info(' ==========>  OCORRREU UM PROBLEMA  <=============');
                Log::info(' ===============>  INFORMACOES  <=================');
                Log::info(' =================================================');
                Log::error($error->getMessage());
                Log::error($error->getTraceAsString());
                Log::info("[Servico: {$class}| Metodo: {$method}] Time: " . round((microtime(true) - $timeStart) * 1000) . " ms");
			}
		});
		return $content;
	}
}