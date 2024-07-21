<?php

namespace App\Pizzeria\Infrastructure\Order;

use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Domain\Order\Order;
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

    public function findAll(): array
    {
        return $this->entityRepository->findAll();
    }

    public function save(Order $order): void
    {
        $this->em->persist($order);
        $this->em->flush();
    }
}
