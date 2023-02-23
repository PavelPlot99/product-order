<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Надстройка экземпляра валидатора.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */

    public function rules(): array
    {
        return [
            'product.title' => ['required', 'min:3'],
            'product.price' => ['numeric'],
        ];
    }
}
