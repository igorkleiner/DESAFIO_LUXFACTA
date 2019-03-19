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
                Log::info("[Servico: {$class}| Metodo: {$method}] Time: " . round((microtime(true) - $timeStart) * 1000) . " ms");
                Log::error($error->getMessage());
                Log::error($error->getTraceAsString());
			}
		});
		return $content;
	}
	public static function callService_2($servico, $metodo, $params)
    {
        return self::post($servico, $metodo, $params, 2);
    }

    protected static function post($servico, $metodo, $params, $versao)
    {
        if ($versao == 2)
        {
            if (is_null($params))
            {
                $params = new \stdClass();
            }
            else
            {
                $params = get_object_vars($params);
            }
        }

        $configs = json_encode(
            array(
                'Request' => array(
                    'Service' => $servico,
                    'Method' => $metodo,
                    // 'Token' => sha1(date('yyyy-mm-dd') . $servico),
                    'Params' => $params,
                    // 'Version' => $versao,
                    // 'Lang'=> \Session::has('LANG') ? \Session::get('LANG') : 'pt',
                )
            )  
        );


        $ch = curl_init();
        $result = '';
        curl_setopt($ch, CURLOPT_URL, Config::get('app.webservice-endpoint'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $configs);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($configs))
        );
        try
        {
            $result = curl_exec($ch);
            curl_close($ch);
        }
        catch (Exception $erro)
        {
            Log::debug('==============> ERRO AO CHAMAR CAMADA DE NEGOCIO <==================');
            Log::debug('~~~~ Informacoes => ' . var_export($erro, true));
            throw new \Exception("Ocorreu um erro. Verifique os LOGS");
        }

        if ($versao == 2)
        {
            $response = json_decode($result);
            
            if($response->status == \ResponseCodes::success)
            {
                $response->isSucesso = new \stdClass();
                $response->isSucesso = true;
            }
            else
            {
                $response->isSucesso = new \stdClass();
                $response->isSucesso = false;
            }
            
            return $response;
        }
        
        return $result;
    }
}