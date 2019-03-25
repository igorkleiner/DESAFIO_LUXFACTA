<?php

// @author IGOR KLEINER <igor_kleiner@hotmail.com> date 03/2019

abstract class InterceptorHandler
{
    public static function interceptService(array $input)
    {
		debug(['$input  no interceptService'=>Input::all()]);
		// DB::listen(function($s,$b,$t)
		// {
		// 	debug([$s, $b, $t]);
		// });

		if (
			$input['Request']['token'] == sha1('sneverscriverdovertouch') &&
			$input['Request']['usu_id'] != Auth::user()->usu_id
		) {
			$login = (new LoginService)->ApiLogin($input['Request']['usu_id']);
			if (!$login) {
				throw new Exception("Api não autenticada");
			}
		}
		debug([
			'ID_USUARIO_LOGADO' => Auth::user()->usu_id,
			'NOME_USUARIO_LOGADO' => Auth::user()->usu_nome
		]);

		// Nesse ponto, implementar o login via token para a api.


        $timeStart = microtime(true);
        $content = null;

        DB::transaction(function() use($input, &$content, $timeStart)
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
				
				self::salvarLog($evento);
				
				Log::info(
					"'".$request['usu_id'].'-'.$request['usu_nome']." action: '".
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
					"'".$request['usu_id'].'-'.$request['usu_nome']." action: '".
					$servico."@".$metodo ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms"
				);
				Log::info($exc->getMessage());
				Log::info($exc->getTraceAsString());
				Log::info(' ==================================================== ');
            }
            catch (Exception $exc)
            {
            }
        }); 

        return Response::make($content, 200);  
    }

    private static function salvarLog($evento)
    {
        $log = new LogService;
        $log->registrarAtividade($evento);
    }
}