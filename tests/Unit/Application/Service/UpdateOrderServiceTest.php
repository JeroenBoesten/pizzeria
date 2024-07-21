<?php

namespace Application\Service;

use App\Pizzeria\Application\Order\Dto\UpdateOrderDto;
use App\Pizzeria\Application\Order\Service\UpdateOrderService;
use App\Pizzeria\Domain\Order\EOrderStatus;
use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Domain\Order\Notifications\OrderNotificationFactory;
use App\Pizzeria\Domain\Order\Order;
use App\Pizzeria\Domain\Store\EStoreName;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @internal
 */
class UpdateOrderServiceTest extends TestCase
{
    #[Test]
    public function can_place_order(): void
    {
        $orderDto = new UpdateOrderDto();
        $orderDto->id = 1;
        $orderDto->store = 'new_york_pizza';
        $orderDto->status = 'in_oven';

        $notificationFactory = $this->createMock(OrderNotificationFactory::class);

        $order = $this->createMock(Order::class);
        $order->expects($this->once())
            ->method('updateStatus')
            ->with(EOrderStatus::IN_OVEN, $notificationFactory);

        $repository = $this->createMock(IOrderRepository::class);
        $repository->expects($this->once())
            ->method('findByIdAndStore')
            ->with($orderDto->id, EStoreName::NEW_YORK_PIZZA)
            ->willReturn($order);

        $repository->expects($this->once())
            ->method('save')
            ->with($order);

        $service = new UpdateOrderService($repository, $notificationFactory);

        $service->execute($orderDto);
    }
}
