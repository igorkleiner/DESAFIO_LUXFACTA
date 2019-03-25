<?php

// @author IGOR KLEINER <igor_kleiner@hotmail.com> date 03/2019


abstract class MakeRequest
{
	public static function callService($class, $method, array $data = array()) /*array $data = array()*/
	{
		$data['USUARIO_LOGADO'] = Auth::user()->usu_id.'- '.Auth::user()->usu_nome;
		$timeStart = microtime(true);
		$content = null;
        
		DB::transaction(function() use ($class, $method, $data, $timeStart, &$content)
		{
			try
			{
				$tmpClass = new $class;
                $result = $tmpClass->$method($data);
				$content = ['status'=> 1, 'response'=>$result];

                $evento = [
                    'usu_id'     => Auth::user()->usu_id,
                    'usu_nome'   => Auth::user()->usu_nome,
                    'data'       => new DateTime(),
                    'servico'    => $class,
                    'metodo'     => $method,
                    'parametros' => json_encode($data),
                ];

                LogService::registrarAtividade($evento);


                Log::info("'".$data['USUARIO_LOGADO']." action: '".$class."@".$method ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
			}

			catch (Exception $error)
			{
				$content = ['status' => 0, 'message' => 'Ocorreu um erro no sistema. Por favor, contate o administrador.'];
                
                Log::info(' =================================================');
                Log::info(' ==========>  OCORRREU UM PROBLEMA  <=============');
                Log::info(' ===============>  INFORMACOES  <=================');
                Log::info(' =================================================');
                Log::info("'".$data['USUARIO_LOGADO']." action: '".$class."@".$method ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
                Log::error($error->getMessage());
                Log::error($error->getTraceAsString());
			}
		});
		return $content;
	}

    /*
     * Funcionamento:
     * É criado um padrão de requests para a camada de negocio, em json.
     * A camada de negocio sabe que deve interceptar este request e instanciar a classe Service referenciada,
     * chamar o metodo referenciado e passar para este método os parametros para tratamento. 
     */
	public static function callService_api($servico, $metodo, array $params = array())
    {
        try
        {

            $configs = json_encode([
                'Request' => [
                    'usu_id'  => Auth::user()->usu_id,
                    'usu_nome'=> Auth::user()->usu_nome,
                    'token'   => sha1('sneverscriverdovertouch'),
                    'Service' => $servico,
                    'Method'  => $metodo,
                    'Params'  => $params
                ]
            ]);

            $url = Config::get('app.webservice-endpoint');

            $ch = self::configCurl($url,$configs,$params);
        
            $result = curl_exec($ch);
            curl_close($ch);
            
            $encoding = mb_detect_encoding($result);

            if($encoding == 'UTF-8')
            {
              $result = preg_replace('/[^(\x20-\x7F)]*/','', $result);    
            }    

            return json_decode($result);
        } 
        catch (Exception $erro)
        {
            Log::debug('==============> ERRO AO CHAMAR CAMADA DE NEGOCIO <==================');
            Log::debug('~~~~ Informacoes => ' . var_export($erro, true));
            throw new Exception("Ocorreu um erro. Verifique os LOGS");
        }
    }

    public static function configCurl($url,$configs,$params)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
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
        return $ch;
    }

    
}