<?php

namespace App\Support\ValueObjects;

use App\Context\Order\Models\ProductStock;

class ProductStockUuid extends ModelUuid
{
    protected function getModelClass(): string
    {
        return ProductStock::class;
    }
}
