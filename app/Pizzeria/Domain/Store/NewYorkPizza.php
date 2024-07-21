<?php

namespace App\Pizzeria\Domain\Store;

class NewYorkPizza implements IStore
{
    public function name(): EStoreName
    {
        return EStoreName::DOMINOS;
    }
}
