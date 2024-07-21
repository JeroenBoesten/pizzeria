<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Http\Resources\OrderResource;
use App\Pizzeria\Application\Order\Dto\Mapper\PlaceOrderRequestDtoMapper;
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

    public function placeOrder(PlaceOrderRequest $request, PlaceOrderService $service): RedirectResponse
    {
        $service->execute(
            (new PlaceOrderRequestDtoMapper())->map($request)
        );

        return redirect()->route('customer.index');
    }
}
