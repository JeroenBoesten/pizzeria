<?php

namespace App\Pizzeria\Infrastructure\Doctrine\Repositories;

use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Domain\Order\Order;
use App\Pizzeria\Domain\Store\EStoreName;
use App\Pizzeria\Domain\Utils\Assert;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class OrderRepository implements IOrderRepository
{
    /** @var EntityRepository<Order> */
    private EntityRepository $entityRepository;

    public function __construct(private EntityManagerInterface $em)
    {
        $this->entityRepository = $this->em->getRepository(Order::class);
    }

    public function findByIdAndStore(int $orderId, EStoreName $store): Order
    {
        $order = $this->entityRepository->createQueryBuilder('pizzaOrder')
            ->where('pizzaOrder.id = :orderId')
            ->andWhere('pizzaOrder.storeName = :storeName')
            ->setParameter('orderId', $orderId)
            ->setParameter('storeName', $store)
            ->getQuery()
            ->getOneOrNullResult();

        Assert::instanceOf($order, Order::class, 'Order');

        return $order;
    }

    public function findAll(): array
    {
        return $this->entityRepository->findAll();
    }

    public function save(Order $order): void
    {
        $this->em->persist($order);
        $this->em->flush();
    }

    public function findAllForStore(EStoreName $storeName): array
    {
        return $this->entityRepository->findBy([
            'storeName' => $storeName,
        ]);
    }
}
