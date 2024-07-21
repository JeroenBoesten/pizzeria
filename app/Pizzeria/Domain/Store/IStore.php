<?php

namespace App\Pizzeria\Domain\Store;

interface IStore
{
    public function name(): EStoreName;
}
