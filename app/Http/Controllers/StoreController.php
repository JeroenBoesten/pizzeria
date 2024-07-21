<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Pizzeria\Application\Order\Dto\Mapper\UpdateOrderRequestDtoMapper;
use App\Pizzeria\Application\Order\Service\UpdateOrderService;
use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Domain\Store\EStoreName;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StoreController
{
    public function index(EStoreName $store, IOrderRepository $orderRepository): View
    {
        return view('store')->with([
            'storeName' => $store->value,
            'orders' => OrderResource::collection($orderRepository->findAllForStore($store))->resolve(),
        ]);
    }

    public function updateOrder(UpdateOrderRequest $request, UpdateOrderService $service): RedirectResponse
    {
        $dto = (new UpdateOrderRequestDtoMapper())->map($request);
        $service->execute($dto);

        return redirect()->route('store.index', [
            'store' => $dto->store,
        ]);
    }
}
