<?php

// @author IGOR KLEINER <igor_kleiner@hotmail.com> date 03/2019


abstract class MakeRequest
{
	public static function callService($class, $method, array $data = array()) /*array $data = array()*/
	{
		$timeStart = microtime(true);
		$content = null;

        
		DB::transaction(function() use ($class, $method, $data, $timeStart, &$content)
		{
            $user = Auth::user()->usu_id.'- '.Auth::user()->usu_nome;
            $data['USUARIO'] = [
                'usu_id'       => Auth::user()->usu_id,
                'usu_nome'     => Auth::user()->usu_nome,
            ];
			try
			{
				$tmpClass = new $class;
				$content = ['status'=> 1, 'response'=>$tmpClass->$method($data)];

                // $evento = [
                //     'usu_id'     => Auth::user()->usu_id,
                //     'usu_nome'   => Auth::user()->usu_nome,
                //     'data'       => new DateTime(),
                //     'servico'    => $class,
                //     'metodo'     => $method,
                //     'parametros' => json_encode($data),
                // ];

                // LogService::registrarAtividade($evento);


                Log::info("'".$user." action: '".$class."@".$method ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
			}

			catch (Exception $error)
			{
				$content = ['status' => 0, 'message' => 'Ocorreu um erro no sistema. Por favor, contate o administrador.'];
                
                Log::info(' =================================================');
                Log::info(' ==========>  OCORRREU UM PROBLEMA  <=============');
                Log::info(' ===============>  INFORMACOES  <=================');
                Log::info(' =================================================');
                Log::info("'".$user." action: '".$class."@".$method ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
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
            $timeStart = microtime(true);
            
            $accessToken = 'xQWOrWrtJuyMwglGD2tAL7sRh8OUjCy9N11Ku3ga6DYv6mQmQXbkD19aGpya';
            // $accessToken = 'fRe9A7uzYY8mLnZFXV4btC8MCQj19yVeItNVrntD';
            // $accessToken = 'lygn4lRuWo4uRmAyHwBw1OLslpvuOXsDpqepiLpr';

            $params['USUARIO'] = [
                'usu_id'       => Auth::user()->usu_id,
                'usu_nome'     => Auth::user()->usu_nome,
            ];

            $configs = json_encode([
                'Request'   => [
                    'token'        => sha1('isneverscrivesdovertouch'),
                    'Service'      => $servico,
                    'Method'       => $metodo,
                    'Params'       => $params
                ]
            ]);

            $url = Config::get('app.webservice-endpoint');

            $ch = self::configCurl($url,$accessToken,$configs,$params);



            $result = curl_exec($ch);
            debug([
                '$result'=>$result,
                '$ch'=>$ch
            ]);
            curl_close($ch);

            
            $encoding = mb_detect_encoding($result);

            if($encoding == 'UTF-8')
            {
              $result = preg_replace('/[^(\x20-\x7F)]*/','', $result);    
            } 

            $user = Auth::user()->usu_id.'- '.Auth::user()->usu_nome;
            Log::info("'".$user." action: '".$servico."@".$metodo ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
            return json_decode($result);
        } 
        catch (Exception $erro)
        {
            Log::debug('==============> ERRO AO CHAMAR CAMADA DE NEGOCIO <==================');
            Log::debug('~~~~ Informacoes => ' . var_export($erro, true));
            Log::info("'".$user." action: '".$servico."@".$metodo ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms");
            throw new Exception("Ocorreu um erro. Verifique os LOGS");
        }
    }

    public static function configCurl($url,$accessToken,$configs,$params)
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
            // 'Content-Length: ' . strlen($configs),
            // 'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer '.$accessToken,
        ));
        return $ch;
    }


        // private $server_url = 'http://192.168.48.2:8072'; // dev
        private $server_url = 'http://atendimentoaceite.la.interbrew.net'; // aceite
        // private $server_url = 'http://atendimentopp.la.interbrew.net';     //pre prod
        // private $server_url = 'http://atendimento.la.interbrew.net';       // prod

        public function open()
        {
            $token = $this->request();

            if (!empty($token) && !isset( json_decode($token)->status ) ) 
            {
                $url =  $this->server_url.
                       '/webservice/v2/login-token-web?'.  // caminho para o webservice
                       'token='. md5('click_api_chamados').// token da api
                       '&setToken='.$token.                // token dinamico que indentifica o usuario
                       '&url='.\Input::get('url');         // url que foi solicitada de abrir no sistema de chamados

                debug([$url]);
                
                return Redirect::to($url);
            }
            else
            {
                return 'Impossivel logar no servidor do Atendimentos';
            }
        }

        public function request()
        {
            $timeStart = microtime(true);
            $url = $this->server_url.'/webservice/v2/login-token-web';
            $data = [
                'getToken' =>true,
                'token' => md5('click_api_chamados'),
                'usuario'  => Session::get('user')->NUMERO_PESSOAL
            ];

            $postdata = http_build_query($data);

            $opts = [
                'http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                ]
            ];

            $context = stream_context_create($opts);
            $result  = file_get_contents($url, false, $context);

            debug([
                '$opts'=>$opts,
                '$url'=>$url,
                '$result'=>$result
            ]);

            $diff = microtime(true) - $timeStart;
            \Log::info('POST TO: CLICK-API-CHAMADOS: '.$url.' Time : '. number_format($diff,3,',','.') . " s");
            return $result;
        }
    
}