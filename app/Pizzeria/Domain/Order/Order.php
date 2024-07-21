<?php

namespace App\Pizzeria\Domain\Order;

use App\Pizzeria\Domain\Pizza\Pizza;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Store\IStore;

class Order
{
    public ?int $id = null;

    public EStoreName $storeName;

    public function __construct(
        IStore $store,
        public Pizza $pizza,
    ) {
        $this->storeName = $store->name();
    }
}
