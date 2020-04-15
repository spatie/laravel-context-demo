<?php

namespace App\Context\Product\Models;

use App\Context\Product\Models\Concerns\HasPriceSetting;
use App\Context\Product\Events\DeletingProductEvent;
use App\Context\Product\Events\ProductCreatedEvent;
use App\Context\Product\Events\ProductDeletedEvent;
use App\Context\Product\Events\ProductUpdatedEvent;
use App\Support\Concerns\HasUuid;
use App\Support\ValueObjects\ProductUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'product_events';

    use HasUuid;

    protected $casts = [
        'capacity' => 'integer',
    ];

    protected $dispatchesEvents = [
        'created' => ProductCreatedEvent::class,
        'updated' => ProductUpdatedEvent::class,
        'deleting' => DeletingProductEvent::class,
        'deleted' => ProductDeletedEvent::class,
    ];

    public function getUuid(): ProductUuid
    {
        return new ProductUuid($this->uuid);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(EventSession::class);
    }
}
