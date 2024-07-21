<?php

namespace Domain\Order;

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
            $pizza
        );

        $this->assertNull($order->id);
        $this->assertEquals(EStoreName::NEW_YORK_PIZZA, $order->storeName);
        $this->assertEquals($pizza, $order->pizza);
    }
}
