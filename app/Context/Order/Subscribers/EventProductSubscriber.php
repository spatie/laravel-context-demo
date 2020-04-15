<?php

namespace App\Context\Order\Subscribers;

use App\Context\Product\Events\DeletingProductEvent as AdminDeletingProductEvent;
use App\Context\Product\Events\ProductCreatedEvent as AdminProductCreatedEvent;
use App\Context\Order\Events\ProductCreatedEvent;
use App\Context\Order\Events\ProductDeletedEvent;
use App\Support\Events\EventSubscriber as BaseEventSubscriber;
use App\Support\Events\SubscribesToEvents;

class EventProductSubscriber implements BaseEventSubscriber
{
    use SubscribesToEvents;

    protected array $handlesEvents = [
        AdminProductCreatedEvent::class => 'onProductCreated',
        AdminDeletingProductEvent::class => 'onDeletingProduct',
    ];

    public function onProductCreated(AdminProductCreatedEvent $event): void
    {
        $event = $event->product;

        event(new ProductCreatedEvent(
            $event->getUuid(),
            $event->capacity,
        ));
    }

    public function onDeletingProduct(AdminDeletingProductEvent $event): void
    {
        $event = $event->product;

        event(new ProductDeletedEvent(
            $event->getUuid(),
        ));
    }
}
