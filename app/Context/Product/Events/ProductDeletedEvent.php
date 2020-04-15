<?php

namespace App\Context\Product\Events;

use App\Context\Product\Models\Product;

class ProductDeletedEvent
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
