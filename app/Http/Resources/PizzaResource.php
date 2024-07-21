<?php

namespace App\Http\Resources;

use App\Pizzeria\Domain\Pizza\Pizza;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Pizza $resource
 */
class PizzaResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'base' => $this->resource->base()->value,
            'topping' => $this->resource->topping()->value,
        ];
    }
}
