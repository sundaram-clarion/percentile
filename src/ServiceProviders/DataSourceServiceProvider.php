<?php
namespace Percentile\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App;

class DataSourceServiceProvider extends ServiceProvider {

	public function register()
	{
		App::bind('Percentile\\Repositories\\DataSourceInterface', 'Percentile\\Repositories\\DataSourceRepository');
	}
}

