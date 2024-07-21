<?php

namespace App\Pizzeria\Domain\Order\Notifications;

class OrderNotificationFactory
{
    public function create(EOrderNotificationChannelName $notificationChannelName): IOrderNotificationChannel
    {
        switch ($notificationChannelName) {
            case EOrderNotificationChannelName::SMS:
                return new SmsOrderNotificationChannel();

            case EOrderNotificationChannelName::EMAIL:
                return new EmailOrderNotificationChannel();
        }
    }
}
