<?php

namespace Tests\Unit\Application\Service;

use App\Pizzeria\Application\Order\Dto\OrderDto;
use App\Pizzeria\Application\Order\Service\PlaceOrderService;
use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Domain\Order\Order;
use App\Pizzeria\Domain\Pizza\EBase;
use App\Pizzeria\Domain\Pizza\ETopping;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Store\NewYorkPizza;
use App\Pizzeria\Domain\Store\StoreFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @internal
 */
class PlaceOrderServiceTest extends TestCase
{
    #[Test]
    public function can_place_order(): void
    {
        $orderDto = new OrderDto();
        $orderDto->store = 'new_york_pizza';
        $orderDto->base = 'classic';
        $orderDto->topping = 'hot_n_spicy';

        $repository = $this->createMock(IOrderRepository::class);
        $repository->expects($this->once())->method('save')->with($this->callback(
            function (Order $order) {
                $this->assertEquals(EBase::CLASSIC, $order->pizza->base);
                $this->assertEquals(ETopping::HOT_N_SPICY, $order->pizza->topping);
                $this->assertEquals(EStoreName::NEW_YORK_PIZZA, $order->storeName);

                return true;
            }
        ));

        $store = $this->createMock(NewYorkPizza::class);
        $store->method('name')->willReturn(EStoreName::NEW_YORK_PIZZA);
        $storeFactory = $this->createMock(StoreFactory::class);
        $storeFactory->expects($this->once())->method('create')
            ->with(EStoreName::NEW_YORK_PIZZA)
            ->willReturn($store);

        $service = new PlaceOrderService($repository, $storeFactory);

        $service->execute($orderDto);
    }
}
