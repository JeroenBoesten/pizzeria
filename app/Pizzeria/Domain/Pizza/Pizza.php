<?php

namespace App\Pizzeria\Domain\Pizza;

class Pizza
{
    private ?int $id;

    public function __construct(
        public EBase $base,
        public ETopping $topping
    ) {}
}
