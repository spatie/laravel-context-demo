<?php

namespace App\Providers;

use App\Support\Events\EventSubscriber;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use SplFileInfo;
use Symfony\Component\Finder\Finder;

class EventServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        collect((new Finder())->files()->in(app()->path()))
            ->map(fn (SplFileInfo $file) => $this->fullQualifiedClassNameFromFile($file))
            ->filter(function (string $eventHandlerClass) {
                return is_subclass_of($eventHandlerClass, EventSubscriber::class);
            })
            ->each(function (string $eventHandlerClass): void {
                Event::subscribe($eventHandlerClass);
            });
    }

    private function fullQualifiedClassNameFromFile(SplFileInfo $file): string
    {
        $class = trim(Str::replaceFirst(app()->path(), '', $file->getRealPath()), DIRECTORY_SEPARATOR);

        $class = str_replace(
            [DIRECTORY_SEPARATOR, 'App\\'],
            ['\\', app()->getNamespace()],
            ucfirst(Str::replaceLast('.php', '', $class))
        );

        return 'App\\'.$class;
    }
}
