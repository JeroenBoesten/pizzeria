<?php

namespace App\Pizzeria\Application\Order\Dto;

class PlaceOrderDto
{
    public ?string $store = null;

    public ?string $base = null;

    public ?string $topping = null;

    public ?string $notificationChannel = null;
}
