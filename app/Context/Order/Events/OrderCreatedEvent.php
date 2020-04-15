<?php

namespace App\Context\Order\Events;

use App\Support\ValueObjects\ProductUuid;
use Spatie\EventSourcing\ShouldBeStored;

class OrderCreatedEvent extends ShouldBeStored
{
    public ProductUuid $productUuid;

    public int $quantity;

    public int $unitPrice;

    public int $totalPrice;

    public function __construct(ProductUuid $productUuid, int $quantity, int $unitPrice, int $totalPrice)
    {
        $this->productUuid = $productUuid;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
        $this->totalPrice = $totalPrice;
    }
}
