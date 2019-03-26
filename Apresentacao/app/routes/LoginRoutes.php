<?php	

	Route::post('/makeLogin',      array('as'=>'makeLogin', 'uses'=>'LoginController@makeLogin'));
	//{{Route(makeLogin) }}
	Route::post('/logout',         array('as'=>'logout',    'uses'=>'LoginController@logout'));
	//{{Route(logout) }}