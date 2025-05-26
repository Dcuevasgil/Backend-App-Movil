<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\\Http\\Controllers\\ApiEPV';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')  // Prefijo '/api' para todas las rutas de la API
            ->middleware('api')  // Middleware 'api' aplicado
            ->namespace($this->namespace)  // El namespace de los controladores será 'App\Http\Controllers'
            ->group(base_path('routes/api.php'));  // Carga las rutas definidas en 'routes/api.php'
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')  // Middleware 'web' aplicado
            ->namespace($this->namespace)  // El namespace de los controladores será 'App\Http\Controllers'
            ->group(base_path('routes/web.php'));  // Carga las rutas definidas en 'routes/web.php'
    }
}
