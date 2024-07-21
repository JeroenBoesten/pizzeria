<?php

namespace Tests\Unit\Domain\Order;

use App\Pizzeria\Domain\Order\EOrderStatus;
use App\Pizzeria\Domain\Order\Notifications\EOrderNotificationChannelName;
use App\Pizzeria\Domain\Order\Notifications\IOrderNotificationChannel;
use App\Pizzeria\Domain\Order\Notifications\OrderNotificationFactory;
use App\Pizzeria\Domain\Order\Order;
use App\Pizzeria\Domain\Pizza\Pizza;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Store\IStore;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @internal
 */
class OrderTest extends TestCase
{
    #[Test]
    public function can_create_order(): void
    {
        $store = $this->createMock(IStore::class);
        $store->method('name')->willReturn(EStoreName::NEW_YORK_PIZZA);
        $pizza = $this->createMock(Pizza::class);

        $order = new Order(
            $store,
            $pizza,
            EOrderNotificationChannelName::EMAIL
        );

        $this->assertNull($order->id());
        $this->assertEquals(EStoreName::NEW_YORK_PIZZA, $order->storeName());
        $this->assertEquals(EOrderNotificationChannelName::EMAIL, $order->notificationChannel());
        $this->assertEquals($pizza, $order->pizza());
        $this->assertEquals(EOrderStatus::RECEIVED, $order->status());
    }

    #[Test]
    public function can_update_order_status(): void
    {
        $store = $this->createMock(IStore::class);
        $store->method('name')->willReturn(EStoreName::NEW_YORK_PIZZA);
        $pizza = $this->createMock(Pizza::class);

        $order = new Order(
            $store,
            $pizza,
            EOrderNotificationChannelName::EMAIL
        );

        $orderNotificationChannel = $this->createMock(IOrderNotificationChannel::class);
        $orderNotificationChannel->expects($this->once())
            ->method('notifyOfStatusChange')
            ->with($order);
        $notificationFactory = $this->createMock(OrderNotificationFactory::class);
        $notificationFactory->expects($this->once())
            ->method('create')
            ->with(EOrderNotificationChannelName::EMAIL)
            ->willReturn($orderNotificationChannel);

        $order->updateStatus(EOrderStatus::IN_OVEN, $notificationFactory);

        $this->assertEquals(EOrderStatus::IN_OVEN, $order->status());
    }
}
