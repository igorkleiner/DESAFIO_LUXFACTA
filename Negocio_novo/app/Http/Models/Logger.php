<?php
 
namespace App\Http\Models;


class Logger extends BaseModel
{
	/*recebe espelho da base de dados da tabela timer*/
	protected $table = "Log";
	protected $primaryKey = "log_id";	
}