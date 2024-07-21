<?php

namespace App\Pizzeria\Domain\Order;

interface IOrderRepository
{
    /** @return list<Order> */
    public function findAll(): array;

    public function save(Order $order): void;
}
