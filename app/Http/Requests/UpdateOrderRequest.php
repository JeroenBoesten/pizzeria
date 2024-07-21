<?php

namespace App\Http\Requests;

use App\Pizzeria\Domain\Order\EOrderStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

/**
 * @property string $store
 * @property int    $orderId
 */
class UpdateOrderRequest extends FormRequest
{
    /**
     * @return array<string, array<mixed>|string|ValidationRule>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'string', new Enum(EOrderStatus::class)],
        ];
    }
}
