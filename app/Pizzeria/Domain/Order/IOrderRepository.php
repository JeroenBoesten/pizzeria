<?php

namespace App\Pizzeria\Domain\Order;

use App\Pizzeria\Domain\Store\EStoreName;

interface IOrderRepository
{
    public function findByIdAndStore(int $orderId, EStoreName $store): Order;

    /** @return list<Order> */
    public function findAll(): array;

    /** @return list<Order> */
    public function findAllForStore(EStoreName $storeName): array;

    public function save(Order $order): void;
}
