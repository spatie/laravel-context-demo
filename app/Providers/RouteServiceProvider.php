<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        $this
            ->mapStaffRoutes()
            ->mapWebRoutes();
    }

    protected function mapStaffRoutes(): self
    {
        Route::middleware('staff')
            ->prefix('staff')
            ->group(base_path('routes/staff.php'));

        return $this;
    }

    protected function mapWebRoutes(): self
    {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        return $this;
    }
}
