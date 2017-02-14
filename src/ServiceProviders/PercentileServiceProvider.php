<?php
namespace Percentile\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App;

class PercentileServiceProvider extends ServiceProvider {

	public function register()
	{
		App::bind('Percentile\\Repositories\\PercentileInterface', 'Percentile\\Repositories\\PercentileRepository');
	}
}