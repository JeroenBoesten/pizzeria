<?php

namespace App\Http\Resources;

use App\Pizzeria\Domain\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Order $resource
 */
class OrderResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'store_name' => $this->resource->storeName->value,
            'pizza' => (new PizzaResource($this->resource->pizza))->resolve(),
            'notification_channel' => $this->resource->notificationChannel->value,
            'status' => $this->resource->status()->value,
        ];
    }
}
