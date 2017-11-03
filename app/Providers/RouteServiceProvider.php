<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        // ref new method for adding client credentials
        $this->mapClientCredentialRoutes();     
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }


    // @link http://filljoyner.com/2017/03/01/how-to-use-client-credentials-grant-tokens-for-your-api-authorization-with-laravel-5-4s-passport/
    /**
     * Define the "client_credentials" routes for the application with prefix "api".
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapClientCredentialRoutes()
    {
        Route::prefix('api') // I still want /api/ urls
            ->middleware('client_credentials')
            ->namespace($this->namespace)
            ->group(base_path('routes/client_credentials.php'));
    }    
}
