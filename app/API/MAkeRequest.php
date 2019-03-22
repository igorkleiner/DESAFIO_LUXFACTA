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
                Log::info("'".$data['USUARIO_LOGADO']['usu_id'].'-'.$data['USUARIO_LOGADO']['usu_nome']." action: '".$class."@".$method ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
			}

			catch (Exception $error)
			{
				$content = ['status' => 0, 'message' => 'Ocorreu um erro no sistema. Por favor, contate o administrador.'];
                
                Log::info(' =================================================');
                Log::info(' ==========>  OCORRREU UM PROBLEMA  <=============');
                Log::info(' ===============>  INFORMACOES  <=================');
                Log::info(' =================================================');
                Log::info("'".$data['USUARIO_LOGADO']['usu_id'].'-'.$data['USUARIO_LOGADO']['usu_nome']." action: '".$class."@".$method ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
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
     * chamar o metodo referenciado e passar para este m�todo os parametros para tratamento. 
     */
	public static function callService_api($servico, $metodo, array $params = array())
    {
        $params['USUARIO_LOGADO'] = Auth::user();

        $configs = json_encode([
            'Request' => [
                'Service' => $servico,
                'Method'  => $metodo,
                'Params'  => $params
            ]
        ]);

        $url = Config::get('app.webservice-endpoint');

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
        
        try
        {
            $result = curl_exec($ch);
            curl_close($ch);
            // // dados de configurações de formatação de jsons para erros de ambiente de produção
            // $encoding = mb_detect_encoding($result);

            // if($encoding == 'UTF-8')
            // {
            //   $result = preg_replace('/[^(\x20-\x7F)]*/','', $result);    
            // }    

            return json_decode($result);
        } 
        catch (Exception $erro)
        {
            Log::debug('==============> ERRO AO CHAMAR CAMADA DE NEGOCIO <==================');
            Log::debug('~~~~ Informacoes => ' . var_export($erro, true));
            throw new Exception("Ocorreu um erro. Verifique os LOGS");
        }
    }

    public function configCurl(){

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
    }

    
}