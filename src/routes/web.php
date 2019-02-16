<?php

Route::group(['namespace' => 'KomjIT\Szamlahegy\Http\Controllers'], function(){
	Route::get('demo', 'SzamlahegyController@index');
});
