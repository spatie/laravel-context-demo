<?php

namespace App\Support\Serialization;

use Spatie\EventSourcing\EventSerializers\EventSerializer;
use Spatie\EventSourcing\ShouldBeStored;

class JsonSerializer implements EventSerializer
{
    public function serialize(ShouldBeStored $event): string
    {
        return json_encode(['event' => serialize($event)]);
    }

    public function deserialize(string $eventClass, string $json): ShouldBeStored
    {
        return unserialize(json_decode($json, true)['event']);
    }
}
