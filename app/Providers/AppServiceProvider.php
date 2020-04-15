<?php

namespace App\Providers;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Model::unguard();

        Flash::levels([
            'success' => 'is-success',
            'warning' => 'is-warning',
            'error' => 'is-error',
        ]);

        Relation::morphMap([
           'event' => Event::class,
        ]);
    }
}
