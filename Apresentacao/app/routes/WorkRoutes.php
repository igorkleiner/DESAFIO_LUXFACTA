<?php	

	Route::any('/workLoger',              array('as'=>'workLoger',              'uses'=>'WorkController@workLoger'));
	//{{Route(workLoger) }}
	Route::post('/salvarTimer',           array('as'=>'salvar.timer',           'uses'=>'WorkController@salvarTimer'));
	//{{Route(salvar.timer) }}
	Route::any('/grafico',                array('as'=>'grafico',                'uses'=>'WorkController@graficoHoras'));
	//{{Route(grafico) }}
	Route::post('/getToEditEmployeeData', array('as'=> 'getToEditEmployeeData', 'uses' => 'WorkController@getToEditEmployeeData'));
	//{{Route('getToEditEmployeeData')}}