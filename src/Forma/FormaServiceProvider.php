<?php namespace Forma;

use Illuminate\Support\ServiceProvider;

class FormaServiceProvider extends ServiceProvider {

	/**
	* Indicates if loading of the provider is deferred.
	*
	* @var bool
	*/
	protected $defer = true;

    public function boot()
    {
        // Facades
        $this->app->bind('forma', function($app)
        {
            return new Forma();
        });
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('forma');
	}

}
