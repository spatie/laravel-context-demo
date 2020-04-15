<?php

namespace App\Providers;

use App\Support\Serialization\ClassDiscriminator;
use App\Support\Serialization\JsonSerializer;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Spatie\EventSourcing\EventSerializers\EventSerializer;

class SerializerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ClassDiscriminator::class, function () {
            $discriminator = new ClassDiscriminator();

            foreach (config('serializer.morph_maps') as $abstractClass => $morphMap) {
                $discriminator->mappingFor($abstractClass, $morphMap);
            }

            return $discriminator;
        });

        $this->app->singleton(EventSerializer::class, function () {
            return new JsonSerializer(
                $this->app->get(ClassDiscriminator::class)
            );
        });
    }
}
