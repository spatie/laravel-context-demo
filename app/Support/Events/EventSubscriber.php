<?php

namespace App\Support\Events;

use Illuminate\Events\Dispatcher;

interface EventSubscriber
{
    public function subscribe(Dispatcher $events): void;
}
