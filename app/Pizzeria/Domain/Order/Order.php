<?php

namespace App\Pizzeria\Domain\Order;

use App\Pizzeria\Domain\Order\Notifications\EOrderNotificationChannelName;
use App\Pizzeria\Domain\Order\Notifications\OrderNotificationFactory;
use App\Pizzeria\Domain\Pizza\Pizza;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Store\IStore;

class Order
{
    public ?int $id = null;

    public EStoreName $storeName;

    private EOrderStatus $status = EOrderStatus::RECEIVED;

    public function __construct(
        IStore $store,
        public Pizza $pizza,
        public EOrderNotificationChannelName $notificationChannel
    ) {
        $this->storeName = $store->name();
    }

    public function updateStatus(EOrderStatus $status, OrderNotificationFactory $notificationFactory): void
    {
        $this->status = $status;

        $notificationFactory->create($this->notificationChannel)->notifyOfStatusChange($this);
    }

    public function status(): EOrderStatus
    {
        return $this->status;
    }
}
