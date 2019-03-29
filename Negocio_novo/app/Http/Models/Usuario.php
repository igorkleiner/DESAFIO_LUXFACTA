<?php 

namespace App\Http\Models;


class Usuario extends BaseModel
{
	/*recebe espelho da base de dados da tabela usuario*/
	protected $table = "usuario";
	protected $primaryKey = "usu_id";

	
}