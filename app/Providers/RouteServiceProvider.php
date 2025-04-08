<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define las rutas para la aplicación.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Mapea las rutas de la API.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')  // Esto agrega el prefijo "api" a las rutas
            ->middleware('api')  // Esto aplica el middleware "api" a las rutas
            ->group(base_path('routes/api.php'));  // Aquí es donde se cargan las rutas desde routes/api.php
    }

    /**
     * Mapea las rutas web.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')  // Aplica el middleware "web"
            ->group(base_path('routes/web.php'));  // Aquí es donde se cargan las rutas desde routes/web.php
    }
}
