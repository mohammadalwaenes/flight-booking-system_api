<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Model\Flight;
use App\User;
use App\Http\Resources\NotFound as NotFoundResource;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        parent::boot();

        // ==============================
        // Route Model Bindings
        // ==============================

        // Binding for Flight
        Route::bind('flight', function ($value) {
            return Flight::find($value) ?? new NotFoundResource([
                'message' => 'Flight not found',
            ]);
        });

        // Binding for User
        Route::bind('user', function ($value) {
            return User::find($value) ?? new NotFoundResource([
                'message' => 'User not found',
            ]);
        });

        // هنا يمكنك إضافة أي binding آخر حسب الحاجة
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
             ->middleware('api')
             ->group(base_path('routes/api.php'));
    }
}