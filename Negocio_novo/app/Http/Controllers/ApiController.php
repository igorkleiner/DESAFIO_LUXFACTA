<?php

namespace App\Http\Controllers;


	use Exception;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    // use App\Exceptions\NegocioException;

class ApiController extends Controller 
{
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function interceptService($request)
	{
		Log::debug(['Input::all() no controler'=>$request]);
		return InterceptorHandler::interceptService($request);
	}
}
