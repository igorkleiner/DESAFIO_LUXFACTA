<?php

class LogService
{
	/**
	* function descriptiom
	* @param
	**/
	// public function registrarAtividade($data)
	// {
	// 	if(!empty($data['parametros']['USUARIO_LOGADO']['idFabrica']) && !empty($data['parametros']['USUARIO_LOGADO']['id']))
	// 	{

	// 		$log = new LogUtilizacao;
	// 		$log->fab_id = $data['parametros']['USUARIO_LOGADO']['idFabrica'];
	// 		$log->usu_id = $data['parametros']['USUARIO_LOGADO']['id'];
	// 		$log->lga_dados = json_encode($data);
	// 		$log->save();

	// 		Fabrica::where('fab_id',$data['parametros']['USUARIO_LOGADO']['idFabrica'])
	// 		->update([
	// 			'fab_ultima_utilizacao'=>date('Y-m-d H:i:s')
	// 		]);
	// 	}
	// }
	// /**
	// *	retorna a data da ultima atualização do webservice do line
	// *	@param none
	// *	@return string
	// */
	// public function getLastUpdatePackaging()
	// {
	// 	return date("d/m/Y H:i:s", strtotime(LogSincronizacaoWebService::selectRaw(" coalesce(date_trunc('seconds',lsws_data_ini), now()) as lsws_data_ini ")
	// 		->where('tsws_id', TipoSincronizacaoWebService::PACKAGING)
	// 		->orderBy('lsws_data_ini', 'desc')
	// 		->first()->lsws_data_ini));
	// }
}