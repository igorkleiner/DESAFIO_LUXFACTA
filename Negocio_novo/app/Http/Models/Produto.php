<?php 

namespace App\Http\Models;


class Produto extends BaseModel
{
	/*recebe espelho da base de dados da tabela usuario*/
	protected $table = "produto";
	protected $primaryKey = "prod_id";

	
}