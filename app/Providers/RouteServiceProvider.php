<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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

        //
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
        /*Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));*/

        Route::group([
            'middleware' => ['api', 'cors'],
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            //Add you routes here, for example:
            //Route::apiResource('/posts','PostController');
//            Route::post('sps','ContactoController@guardarSPS');
//            Route::get('list','ContactoController@getList');


            Route::post('register', 'Auth\RegisterController@register');
            Route::post('login', 'LoginController@login');


//USUARIOS
            Route::get('usuarios', 'UserController@index');
            Route::get('usuarios/{id}', 'UserController@show');
            Route::post('usuarios', 'UserController@store');
            Route::put('usuarios/{id}', 'UserController@update');
            Route::delete('usuarios/{id}', 'UserController@destroy');

//ROLES
            Route::get('roles', 'RolController@index');
            Route::post('roles', 'RolController@store');
            Route::get('roles/{id}', 'RolController@show');


//DESTINOS
            Route::get('destinos', 'DestinoController@index');
            Route::get('destinos/{id}', 'DestinoController@show');
            Route::post('destinos', 'DestinoController@store');
            Route::put('destinos/{id}', 'DestinoController@update');
            Route::delete('destinos/{id}', 'DestinoController@destroy');

//TOURS
            Route::get('tours', 'TourController@index');
            Route::get('tours/{id}', 'TourController@show');
            Route::post('tours', 'TourController@store');
            Route::put('tours/{id}', 'TourController@update');
            Route::delete('tours/{id}', 'TourController@destroy');

//SERVICIOS ADIDIONALES
            Route::get('servicios-adicionales', 'ServicioAdicionalController@index');
            Route::get('servicios-adicionales/{id}', 'ServicioAdicionalController@show');
            Route::post('servicios-adicionales', 'ServicioAdicionalController@store');
            Route::put('servicios-adicionales/{id}', 'ServicioAdicionalController@update');
            Route::delete('servicios-adicionales/{id}', 'ServicioAdicionalController@destroy');

//CONTRATOS
            Route::get('contratos', 'ContratoController@index');
            Route::get('contratos/{id}', 'ContratoController@show');
            Route::post('contratos', 'ContratoController@store');
            Route::put('contratos/{id}', 'ContratoController@update');
            Route::delete('contratos/{id}', 'ContratoController@destroy');


//CURSOS
            Route::get('cursos', 'CursoController@index');
            Route::get('cursos/{id}', 'CursoController@show');
            Route::post('cursos', 'CursoController@store');
            Route::put('cursos/{id}', 'CursoController@update');
            Route::delete('cursos/{id}', 'CursoController@destroy');

        });
    }
}
