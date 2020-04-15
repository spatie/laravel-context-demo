<?php

namespace App\Support\ValueObjects;

use App\Context\Product\Models\Product;

class ProductUuid extends ModelUuid
{
    protected function getModelClass(): string
    {
        return Product::class;
    }
}
