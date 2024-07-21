<?php

namespace Domain\Store;

use App\Pizzeria\Domain\Store\Dominos;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Store\NewYorkPizza;
use App\Pizzeria\Domain\Store\StoreFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @internal
 */
class StoreFactoryTest extends TestCase
{
    #[Test]
    public function creates_new_york_pizza(): void
    {
        $storeFactory = new StoreFactory();
        $store = $storeFactory->create(EStoreName::NEW_YORK_PIZZA);

        $this->assertInstanceOf(NewYorkPizza::class, $store);
    }

    #[Test]
    public function creates_dominos(): void
    {
        $storeFactory = new StoreFactory();
        $store = $storeFactory->create(EStoreName::DOMINOS);

        $this->assertInstanceOf(Dominos::class, $store);
    }
}
