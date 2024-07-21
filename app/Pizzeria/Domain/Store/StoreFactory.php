<?php

namespace App\Pizzeria\Domain\Store;

class StoreFactory
{
    public function create(EStoreName $storeName): IStore
    {
        switch ($storeName) {
            case EStoreName::NEW_YORK_PIZZA:
                return new NewYorkPizza();

            case EStoreName::DOMINOS:
                return new Dominos();
        }
    }
}
