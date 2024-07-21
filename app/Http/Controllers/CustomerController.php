<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Pizzeria\Application\Order\Dto\Mapper\OrderRequestDtoMapper;
use App\Pizzeria\Application\Order\Service\PlaceOrderService;
use App\Pizzeria\Domain\Order\IOrderRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController
{
    public function index(IOrderRepository $orderRepository): View
    {
        return view('customer')->with([
            'orders' => OrderResource::collection($orderRepository->findAll())->resolve(),
        ]);
    }

    public function placeOrder(OrderRequest $request, PlaceOrderService $service): RedirectResponse
    {
        $service->execute(
            (new OrderRequestDtoMapper())->map($request)
        );

        return redirect()->route('customer.index');
    }
}
