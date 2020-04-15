<?php

namespace App\Context\Order\Models;

use App\Context\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    /**
     * @param \App\Context\Product\Models\Product|\App\Support\ValueObjects\ProductUuid $productUuid
     *
     * @return \App\Context\Order\Models\ProductStock
     */
    public static function forProduct($productUuid): ProductStock
    {
        if ($productUuid instanceof Product) {
            $productUuid = $productUuid->getUuid();
        }

        return static::query()
            ->where('product_uuid', $productUuid)
            ->first();
    }
}
