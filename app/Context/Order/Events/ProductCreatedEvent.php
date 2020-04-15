<?php

namespace App\Context\Order\Events;

use App\Support\ValueObjects\ProductUuid;
use Spatie\EventSourcing\ShouldBeStored;

class ProductCreatedEvent extends ShouldBeStored
{
    public ProductUuid $productUuid;

    public int $capacity;

    public function __construct(ProductUuid $productUuid, int $stock)
    {
        $this->productUuid = $productUuid;

        $this->stock = $stock;
    }
}
