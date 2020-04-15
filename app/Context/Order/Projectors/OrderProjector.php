<?php

namespace App\Context\Order\Projectors;

use App\Context\Order\Events\ProductDeletedEvent;
use App\Context\Order\Events\OrderCreatedEvent;
use App\Context\Order\Events\OrderCancelledEvent;
use App\Context\Order\Models\Order;
use App\Context\Order\OrderAggregateRoot;
use Spatie\EventSourcing\Projectors\Projector;
use Spatie\EventSourcing\Projectors\ProjectsEvents;

class OrderProjector implements Projector
{
    use ProjectsEvents;

    protected array $handlesEvents = [
        OrderCreatedEvent::class => 'onOrderCreated',
        OrderCancelledEvent::class => 'onOrderCancelled',
        ProductDeletedEvent::class => 'onProductDeleted',
    ];

    public function onOrderCreated(OrderCreatedEvent $event): void
    {
        Order::create([
            'uuid' => $event->aggregateRootUuid(),
            'event_uuid' => $event->eventUuid,
            'amount' => $event->quantity,
            'unit_price' => $event->unitPrice,
            'total_price' => $event->totalPrice,
        ]);
    }

    public function onOrderCancelled(OrderCancelledEvent $event): void
    {
        Order::query()
            ->where('uuid', $event->aggregateRootUuid())
            ->delete();
    }

    public function onProductDeleted(ProductDeletedEvent $event): void
    {
        Order::cursor()
            ->where('event_uuid', $event->productUuid)
            ->each(function (Order $reservation): void {
                OrderAggregateRoot::retrieve($reservation->uuid)
                    ->cancelOrder()
                    ->persist();
            });
    }
}
