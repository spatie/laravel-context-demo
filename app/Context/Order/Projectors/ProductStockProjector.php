<?php

namespace App\Context\Order\Projectors;

use App\Context\Order\Events\OrderCancelledEvent;
use App\Context\Order\Events\ProductCreatedEvent;
use App\Context\Order\Events\ProductDeletedEvent;
use App\Context\Order\Events\OrderCreatedEvent;
use App\Context\Order\Models\Order;
use App\Context\Order\Models\ProductStock;
use App\Support\ValueObjects\ProductStockUuid;
use Spatie\EventSourcing\Projectors\Projector;
use Spatie\EventSourcing\Projectors\ProjectsEvents;

class ProductStockProjector implements Projector
{
    use ProjectsEvents;

    protected array $handlesEvents = [
        ProductCreatedEvent::class => 'onProductCreated',
        ProductDeletedEvent::class => 'onProductDeleted',
        OrderCreatedEvent::class => 'onOrderCreated',
        OrderCancelledEvent::class => 'onOrderCancelled',

    ];

    public function onProductCreated(ProductCreatedEvent $event): void
    {
        ProductStock::create([
            'uuid' => ProductStockUuid::create(),
            'product_uuid' => $event->productUuid,
            'stock' => $event->stock,
        ]);
    }

    public function onProductDeleted(ProductDeletedEvent $event): void
    {
        ProductStock::forProduct($event->productUuid)->delete();
    }

    public function onOrderCreated(OrderCreatedEvent $event): void
    {
        $productStock = ProductStock::forProduct($event->productUuid);

        $productStock->update([
            'stock' => $productStock->stock - $event->quantity,
        ]);
    }

    public function onOrderCancelled(OrderCancelledEvent $event): void
    {
        $order = Order::findByUuid($event->aggregateRootUuid());

        $productStock = ProductStock::forProduct($order->product->uuid);

        $productStock->update([
            'stock' => $productStock->stock + $order->quantity,
        ]);
    }
}
