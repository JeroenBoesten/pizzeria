<?php

namespace App\Pizzeria\Domain\Order\Notifications;

enum EOrderNotificationChannelName: string
{
    case EMAIL = 'email';
    case SMS = 'sms';
}
