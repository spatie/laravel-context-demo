<?php

namespace App\Support\Events;

use Illuminate\Events\Dispatcher;

trait SubscribesToEvents
{
    public function subscribe(Dispatcher $events): void
    {
        foreach (($this->handlesEvents ?? []) as $event => $handler) {
            $events->listen(
                $event,
                static::class . "@{$handler}"
            );
        }
    }
}
