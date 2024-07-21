<?php

namespace App\Pizzeria\Domain\Order\Notifications;

use App\Pizzeria\Domain\Order\Order;

interface IOrderNotificationChannel
{
    public function notifyOfStatusChange(Order $order): void;

    public function name(): EOrderNotificationChannelName;
}
