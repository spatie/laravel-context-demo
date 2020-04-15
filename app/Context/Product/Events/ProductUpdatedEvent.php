<?php

namespace App\Context\Product\Events;

use App\Context\Product\Models\Product;

class ProductUpdatedEvent
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
