<?php

namespace App\Pizzeria\Application\Order\Service;

use App\Pizzeria\Application\Order\Dto\PlaceOrderDto;
use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Domain\Order\Notifications\EOrderNotificationChannelName;
use App\Pizzeria\Domain\Order\Order;
use App\Pizzeria\Domain\Pizza\EBase;
use App\Pizzeria\Domain\Pizza\ETopping;
use App\Pizzeria\Domain\Pizza\Pizza;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Store\StoreFactory;
use App\Pizzeria\Domain\Utils\Assert;

readonly class PlaceOrderService
{
    public function __construct(
        private IOrderRepository $orderRepository,
        private StoreFactory $storeFactory
    ) {}

    public function execute(PlaceOrderDto $orderDto): void
    {
        Assert::notNull($orderDto->store, 'store');
        Assert::notNull($orderDto->base, 'base');
        Assert::notNull($orderDto->topping, 'topping');
        Assert::notNull($orderDto->notificationChannel, 'notification_channel');

        $store = $this->storeFactory->create(EStoreName::from($orderDto->store));

        $order = new Order(
            $store,
            new Pizza(
                EBase::from($orderDto->base),
                ETopping::from($orderDto->topping)
            ),
            EOrderNotificationChannelName::from($orderDto->notificationChannel)
        );

        $this->orderRepository->save($order);
    }
}
