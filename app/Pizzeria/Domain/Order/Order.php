<?php

namespace App\Pizzeria\Domain\Order;

use App\Pizzeria\Domain\Order\Notifications\EOrderNotificationChannelName;
use App\Pizzeria\Domain\Order\Notifications\OrderNotificationFactory;
use App\Pizzeria\Domain\Pizza\Pizza;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Store\IStore;

class Order
{
    private ?int $id = null;

    private EStoreName $storeName;

    private EOrderStatus $status = EOrderStatus::RECEIVED;

    public function __construct(
        IStore $store,
        private Pizza $pizza,
        private EOrderNotificationChannelName $notificationChannel
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

    public function id(): ?int
    {
        return $this->id;
    }

    public function storeName(): EStoreName
    {
        return $this->storeName;
    }

    public function pizza(): Pizza
    {
        return $this->pizza;
    }

    public function notificationChannel(): EOrderNotificationChannelName
    {
        return $this->notificationChannel;
    }
}
