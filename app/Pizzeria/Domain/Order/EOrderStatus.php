<?php

namespace App\Pizzeria\Domain\Order;

enum EOrderStatus: string
{
    case RECEIVED = 'received';

    case PREPARING = 'preparing';

    case IN_OVEN = 'in_oven';

    case IN_DELIVERY = 'in_delivery';

    case DELIVERED = 'delivered';
}
