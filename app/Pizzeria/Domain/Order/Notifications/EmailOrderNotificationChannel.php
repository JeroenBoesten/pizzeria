<?php

namespace App\Pizzeria\Domain\Order\Notifications;

use App\Pizzeria\Domain\Order\Order;

class EmailOrderNotificationChannel implements IOrderNotificationChannel
{
    public function notifyOfStatusChange(Order $order): void
    {
        // TODO: Implement notifyOfStatusChange() method.
    }

    public function name(): EOrderNotificationChannelName
    {
        return EOrderNotificationChannelName::SMS;
    }
}
