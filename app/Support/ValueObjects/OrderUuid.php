<?php

namespace App\Support\ValueObjects;

use App\Context\Order\Models\Order;

class OrderUuid extends ModelUuid
{
    protected function getModelClass(): string
    {
        return Order::class;
    }
}
