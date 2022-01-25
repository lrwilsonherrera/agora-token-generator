<?php

namespace EurekuDev\AgoraKeyGenerator;

use EurekuDev\AgoraKeyGenerator\RtmToken;
use Illuminate\Support\ServiceProvider;

class AgoraKeyGeneratorServiceProvider extends ServiceProvider
{
	public function register()
	{
		// $this->mergeConfigFrom(__DIR__.'/config/config.php', 'agorakeygenerator');

		$this->app->bind('rtmtoken', function($app) {
			return new RtmToken();
		});
	}

	public function boot()
	{	
		if ($this->app->runningInConsole()) {

			$this->publishes([
				__DIR__.'/config/config.php' => config_path('agorakeygenerator.php'),
			], 'config');

		}
	}
}
