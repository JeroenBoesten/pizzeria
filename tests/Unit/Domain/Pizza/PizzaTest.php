<?php

namespace Domain\Pizza;

use App\Pizzeria\Domain\Pizza\EBase;
use App\Pizzeria\Domain\Pizza\ETopping;
use App\Pizzeria\Domain\Pizza\Pizza;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class PizzaTest extends TestCase
{
    #[Test]
    public function can_create_pizza(): void
    {
        $pizza = new Pizza(
            EBase::CHEESY_CRUST,
            ETopping::HOT_N_SPICY
        );

        $this->assertEquals(EBase::CHEESY_CRUST, $pizza->base);
        $this->assertEquals(ETopping::HOT_N_SPICY, $pizza->topping);
    }
}
