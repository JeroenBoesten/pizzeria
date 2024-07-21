<?php

namespace App\Pizzeria\Domain\Pizza;

class Pizza
{
    private ?int $id;

    public function __construct(
        private EBase $base,
        private ETopping $topping
    ) {}

    public function base(): EBase
    {
        return $this->base;
    }

    public function topping(): ETopping
    {
        return $this->topping;
    }
}
