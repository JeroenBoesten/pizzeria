<?php

namespace App\Pizzeria\Application\Order\Service;

use App\Pizzeria\Application\Order\Dto\UpdateOrderDto;
use App\Pizzeria\Domain\Order\EOrderStatus;
use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Domain\Order\Notifications\OrderNotificationFactory;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Utils\Assert;

readonly class UpdateOrderService
{
    public function __construct(
        private IOrderRepository $orderRepository,
        private OrderNotificationFactory $notificationFactory
    ) {}

    public function execute(UpdateOrderDto $orderDto): void
    {
        Assert::notNull($orderDto->id, 'order_id');
        Assert::notNull($orderDto->store, 'store');
        Assert::notNull($orderDto->status, 'status');
        $order = $this->orderRepository->findByIdAndStore($orderDto->id, EStoreName::from($orderDto->store));

        $order->updateStatus(
            EOrderStatus::from($orderDto->status),
            $this->notificationFactory
        );

        $this->orderRepository->save($order);
    }
}
