<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

$glob_file = __DIR__.DIRECTORY_SEPARATOR.'web'.DIRECTORY_SEPARATOR.'*';
foreach(glob($glob_file) as $file)
{
	include $file;
}
// Route::any('/api', 'ApiController@interceptService')->name('api');
Route::any('/api', function () {
	debug(Input::all());
	return InterceptorHandler::interceptService(Input::all());
})->name('api');

Route::get('/phpinfo',function(){phpinfo();})->name('phpinfo');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
