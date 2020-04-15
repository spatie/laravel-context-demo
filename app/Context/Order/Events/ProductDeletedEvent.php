<?php

namespace App\Context\Order\Events;

use App\Support\ValueObjects\ProductUuid;
use Spatie\EventSourcing\ShouldBeStored;

class ProductDeletedEvent extends ShouldBeStored
{
    public ProductUuid $productUuid;

    public function __construct(ProductUuid $productUuid)
    {
        $this->productUuid = $productUuid;
    }
}
