<?php

// @author IGOR KLEINER <igor_kleiner@hotmail.com> date 03/2019

	use Exception;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use App\Exceptions\NegocioException;

abstract class InterceptorHandler
{
    public static function interceptService(array $input)
    {
		debug(['$input  no interceptService'=>$input]);
		DB::listen(function($s,$b,$t)
		{
			debug([$s, $b, $t]);
		});

	    $content = null;
		if($input['Request']['token'] == sha1('isneverscrivesdovertouch'))
		{

	        $timeStart = microtime(true);

	        DB::transaction(function() use($input, $timeStart, &$content)
	        { 
	            try
	            {
					$request = $input['Request'];
					$servico = $request['Service'];
					$metodo  = $request['Method'];
					$params  = $request['Params'];
					$user    = $params['USUARIO'];

					$service = new $servico;

					$content = ['status' => 1, 'response' => $service->$metodo($params)];
					
					$evento = [
						'usu_id'     => $user['usu_id'],
						'usu_nome'   => $user['usu_nome'],
						'data'       => new DateTime(),
						'servico'    => $servico,
						'metodo'     => $metodo,
						'parametros' => json_encode($params),
					];
					
					LogService::registrarAtividade($evento);
					
					Log::info(
						"'".$user['usu_id'].'- '.$user['usu_nome']." action: '".
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
						"'".$user['usu_id'].'- '.$user['usu_nome']." action: '".
						$servico."@".$metodo ." Time: " .round((microtime(true) - $timeStart) * 1000) . " ms"
					);
					
					Log::info($exc->getMessage());
					Log::info($exc->getTraceAsString());
					Log::info(' ==================================================== ');
	            }
	        }); 
	        return Response::make($content, 200);  
		}
		else
		{
			return ['status'=>0, 'message'=>"Access denied"];  
		}
    }
}