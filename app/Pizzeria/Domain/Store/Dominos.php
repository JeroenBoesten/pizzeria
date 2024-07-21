<?php

namespace App\Pizzeria\Domain\Store;

class Dominos implements IStore
{
    public function name(): EStoreName
    {
        return EStoreName::DOMINOS;
    }
}
