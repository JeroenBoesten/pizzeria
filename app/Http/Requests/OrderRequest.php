<?php

namespace App\Http\Requests;

use App\Pizzeria\Domain\Pizza\EBase;
use App\Pizzeria\Domain\Pizza\ETopping;
use App\Pizzeria\Domain\Store\EStoreName;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<mixed>|string|ValidationRule>
     */
    public function rules(): array
    {
        return [
            'store' => ['required', 'string', new Enum(EStoreName::class)],
            'base' => ['required', 'string', new Enum(EBase::class)],
            'topping' => ['required', 'string', new Enum(ETopping::class)],
        ];
    }
}
