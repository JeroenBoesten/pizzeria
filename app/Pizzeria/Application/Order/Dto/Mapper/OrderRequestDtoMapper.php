<?php

namespace App\Pizzeria\Application\Order\Dto\Mapper;

use App\Http\Requests\OrderRequest;
use App\Pizzeria\Application\Order\Dto\OrderDto;
use App\Pizzeria\Domain\Utils\Assert;

class OrderRequestDtoMapper
{
    public function map(OrderRequest $request): OrderDto
    {
        $dto = new OrderDto();

        Assert::isStringOrNull($request->validated('store'), 'store');
        $dto->store = $request->validated('store');

        Assert::isStringOrNull($request->validated('base'), 'base');
        $dto->base = $request->validated('base');

        Assert::isStringOrNull($request->validated('topping'), 'topping');
        $dto->topping = $request->validated('topping');

        return $dto;
    }
}
