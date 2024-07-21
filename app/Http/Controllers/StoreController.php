<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Domain\Store\EStoreName;
use Illuminate\Contracts\View\View;

class StoreController
{
    public function index(EStoreName $store, IOrderRepository $orderRepository): View
    {
        return view('store')->with([
            'storeName' => $store->value,
            'orders' => OrderResource::collection($orderRepository->findAllForStore($store))->resolve(),
        ]);
    }
}
