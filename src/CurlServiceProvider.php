<?php namespace Dinke;

use Illuminate\Support\ServiceProvider;

class CurlServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register ()
	{
		$this->app->singleton('curl', function ()
		{
			return new Curl;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides ()
	{
		return ['curl'];
	}
}
