<?php

namespace KomjIT\Szamlahegy;

use Illuminate\Support\ServiceProvider;

class SzamlahegyServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');
	}
	
	public function register()
	{
		
	}
}
