<?php

namespace App\Pizzeria\Application\Order\Dto;

class UpdateOrderDto
{
    public ?int $id = null;

    public ?string $status = null;

    public ?string $store = null;
}
