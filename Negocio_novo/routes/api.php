<?php

use Illuminate\Http\Request;
use App\Http\Controllers\InterceptorHandler;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::any('/web', 'ApiController@interceptService')->name('web');
Route::any('/web', function(Request $request){
	return InterceptorHandler::interceptService(array($request));
})->name('web');