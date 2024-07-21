<?php

namespace App\Pizzeria\Application\Order\Dto\Mapper;

use App\Http\Requests\PlaceOrderRequest;
use App\Pizzeria\Application\Order\Dto\PlaceOrderDto;
use App\Pizzeria\Domain\Utils\Assert;

class PlaceOrderRequestDtoMapper
{
    public function map(PlaceOrderRequest $request): PlaceOrderDto
    {
        $dto = new PlaceOrderDto();

        Assert::isStringOrNull($request->validated('store'), 'store');
        $dto->store = $request->validated('store');

        Assert::isStringOrNull($request->validated('base'), 'base');
        $dto->base = $request->validated('base');

        Assert::isStringOrNull($request->validated('topping'), 'topping');
        $dto->topping = $request->validated('topping');

        Assert::isStringOrNull($request->validated('notification_channel'), 'notification_channel');
        $dto->notificationChannel = $request->validated('notification_channel');

        return $dto;
    }
}
