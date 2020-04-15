<?php

namespace App\Context\Order;

use App\Context\Product\Models\Product;
use App\Context\Order\Events\CouldNotCreateOrderBecauseInsufficientStock;
use App\Context\Order\Events\OrderCreatedEvent;
use App\Context\Order\Events\OrderCancelledEvent;
use App\Context\Order\Exceptions\CannotCreateOrderBecauseInsufficientStock;
use App\Context\Order\Models\ProductStock;
use Spatie\EventSourcing\AggregateRoot;

class OrderAggregateRoot extends AggregateRoot
{
    public function createOrder(Product $product, int $quantity): self
    {
        $eventAvailability = ProductStock::forProduct($product);

        if ($eventAvailability->availability < $quantity) {
            $this->recordThat(new CouldNotCreateOrderBecauseInsufficientStock(
                $product->getUuid(),
                $quantity
            ));

            throw CannotCreateOrderBecauseInsufficientStock::make();
        }

        $unitPrice = $product->unit_price;

        $totalPrice = $unitPrice * $quantity;

        $this->recordThat(new OrderCreatedEvent(
            $product->getUuid(),
            $quantity,
            $unitPrice,
            $totalPrice,
        ));

        return $this;
    }

    public function cancelOrder(): self
    {
        $this->recordThat(new OrderCancelledEvent());

        return $this;
    }
}
