<?php

abstract class InterceptorHandler
{
    public static function interceptService(array $input)
    {
         
    	// debug(['$input  no interceptService'=>Input::all()]);
        // DB::listen(function($s,$b,$t)
        // {
        //     debug([$s, $b, $t]);
        // });
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
				// self::registrarAtividade($servico, $metodo, $params);
				Log::info(
					"'".$input['ID_USUARIO_LOGADO'].'-'.$input['Request']['Params']['USUARIO_LOGADO']['usu_nome']." action: '".
					$servico."@".$metodo ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms"
				);
            }
            catch(Exception $exc)
            {
				$content = ['status' => 0, 'message' => $exc->getMessage()];
				Log::info(' =================================================');
				Log::info(' ==========>  OCORRREU UM PROBLEMA  <=============');
				Log::info(' ===============>  INFORMACOES  <=================');
				Log::info(' =================================================');
				Log::info(
					"'".$input['ID_USUARIO_LOGADO'].'-'.$input['Request']['Params']['USUARIO_LOGADO']['usu_nome']." action: '".
					$servico."@".$metodo ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms"
				);
				Log::info($exc->getMessage());
				Log::info($exc->getTraceAsString());
            }
            catch (Exception $exc)
            {
            }
        });

        return Response::make($content, 200);  
    }

    private static function registrarAtividade($classe, $metodo, $parametros)
    {
        $log = new LogService;
        $log->registrarAtividade(['classe'=>$classe, 'metodo'=>$metodo, 'parametros'=>$parametros]);
    }
}