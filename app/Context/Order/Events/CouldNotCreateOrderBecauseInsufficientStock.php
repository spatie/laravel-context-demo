<?php

namespace App\Context\Order\Events;

use App\Support\ValueObjects\ProductUuid;
use Spatie\EventSourcing\ShouldBeStored;

class CouldNotCreateOrderBecauseInsufficientStock extends ShouldBeStored
{
    private ProductUuid $event_uuid;

    private int $quantity;

    public function __construct(ProductUuid $productUuid, int $quantity)
    {
        $this->event_uuid = $productUuid;
        $this->quantity = $quantity;
    }
}
