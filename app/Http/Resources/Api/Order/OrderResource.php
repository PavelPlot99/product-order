<?php

namespace App\Http\Resources\Api\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'amount' => $this->amount,
            'user_id' => $this->user_id,
            'user' => $this->user,
            'products' => $this->products
        ];
    }
}
