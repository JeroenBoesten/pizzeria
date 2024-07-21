<?php

namespace Tests\Unit\Infrastructure\Doctrine\Repositories;

use App\Pizzeria\Domain\Order\Notifications\EOrderNotificationChannelName;
use App\Pizzeria\Domain\Order\Order;
use App\Pizzeria\Domain\Pizza\EBase;
use App\Pizzeria\Domain\Pizza\ETopping;
use App\Pizzeria\Domain\Pizza\Pizza;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Store\NewYorkPizza;
use App\Pizzeria\Infrastructure\Doctrine\Repositories\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @internal
 */
class OrderRepositoryTest extends TestCase
{
    private OrderRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('doctrine:schema:create');

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->app->make(EntityManagerInterface::class);
        $this->repository = new OrderRepository($entityManager);
    }

    /**
     * Normally this would be separate test cases, but for the sake of simplicity because of in memory database tests we'll keep it in one.
     */
    #[Test]
    public function can_store_and_find(): void
    {
        $order = new Order(
            new NewYorkPizza(),
            new Pizza(
                EBase::CHEESY_CRUST,
                ETopping::HOT_N_SPICY
            ),
            EOrderNotificationChannelName::SMS
        );

        $this->repository->save($order);
        $this->assertIsInt($order->id);
        $this->assertCount(1, $this->repository->findAll());
        $this->assertCount(1, $this->repository->findAllForStore(EStoreName::DOMINOS));
        $this->assertCount(0, $this->repository->findAllForStore(EStoreName::NEW_YORK_PIZZA));
    }
}
