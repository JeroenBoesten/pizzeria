<?php

namespace App\Pizzeria\Application\Order\Dto\Mapper;

use App\Http\Requests\UpdateOrderRequest;
use App\Pizzeria\Application\Order\Dto\UpdateOrderDto;
use App\Pizzeria\Domain\Utils\Assert;

class UpdateOrderRequestDtoMapper
{
    public function map(UpdateOrderRequest $request): UpdateOrderDto
    {
        $dto = new UpdateOrderDto();

        Assert::isStringOrNull($request->validated('status'), 'status');
        $dto->id = $request->orderId;
        $dto->store = $request->store;
        $dto->status = $request->validated('status');

        return $dto;
    }
}
