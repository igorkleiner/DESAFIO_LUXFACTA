<?php

// @author IGOR KLEINER <igor_kleiner@hotmail.com> date 03/2019

abstract class InterceptorHandler
{
    public static function interceptService(array $input)
    {
		debug(['$input  no interceptService'=>$input]);
		// DB::listen(function($s,$b,$t)
		// {
		// 	debug([$s, $b, $t]);
		// });

		if (
			$input['Request']['token'] == sha1('isneverscrivesdovertouch') &&
			$input['Request']['usu_id'] != Auth::user()->usu_id
		){
			$user = [
                'usu_login'    => $input['Request']['usu_login'],
                'usu_password' => $input['Request']['usu_password'],
			];
			$login = (new LoginService)->ApiLogin($user);
			if (!$login) {
				throw new Exception("Api não autenticada");
			}
		}
		debug([
			'ID_USUARIO_LOGADO'   => Auth::user()->usu_id,
			'NOME_USUARIO_LOGADO' => Auth::user()->usu_nome
		]);

        $timeStart = microtime(true);
        $content = null;

        DB::transaction(function() use($input, $timeStart, &$content)
        { 
            try
            {
				$request = $input['Request'];
				$servico = $request['Service'];
				$metodo  = $request['Method'];
				$params  = $request['Params'];
				$service = new $servico;
				$content = ['status' => 1, 'response' => $service->$metodo($params)];
				
				$evento = [
					'usu_id'     => $request['usu_id'],
					'usu_nome'   => $request['usu_nome'],
					'data'       => new DateTime(),
					'servico'    => $servico,
					'metodo'     => $metodo,
					'parametros' => json_encode($params),
				];
				
				LogService::registrarAtividade($evento);
				
				Log::info(
					"'".$request['usu_id'].'- '.$request['usu_nome']." action: '".
					$servico."@".$metodo ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms"
				);
            }
            catch(Exception $exc)
            {
				$content = ['status' => 0, 'message' => $exc->getMessage()];
				Log::info(' ==================================================== ');
				Log::info(' =============>  OCORRREU UM PROBLEMA  <============= ');
				Log::info(' =================>  INFORMACOES   <================= ');
				Log::info(' ==================================================== ');
				Log::info(
					"'".$request['usu_id'].'- '.$request['usu_nome']." action: '".
					$servico."@".$metodo ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms"
				);
				Log::info($exc->getMessage());
				Log::info($exc->getTraceAsString());
				Log::info(' ==================================================== ');
            }
        }); 

        return Response::make($content, 200);  
    }
}