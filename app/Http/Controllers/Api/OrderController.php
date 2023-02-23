<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Http\Resources\Api\Order\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderController extends Controller
{
    public function index(Request $request):JsonResource
    {
        $limit = $request->get('limit') ?? 15;
        $date = $request->get('date');
        $query = Order::query()->with('products', 'user');
        if(isset($date)){
            $query->where('date', $date);
        }

        return OrderResource::collection($query->paginate($limit));
    }

    public function show(Order $order):JsonResource
    {
        return OrderResource::make($order);
    }

    public function store(StoreOrderRequest $request):JsonResource
    {
        $data = $request->get('order');
        $products = $request->get('products') ?? null;

        $order = Order::query()->create($data);

        if(isset($products)){
            $order->products()->sync($products);
        }

        return OrderResource::make($order);
    }

    public function update(StoreOrderRequest $request, Order $order)
    {
        $data = $request->get('order');
        $products= $request->get('products') ?? null;

        $order->update($data);

        if(isset($products)){
            $order->products()->sync($products);
        }

        return OrderResource::make($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return OrderResource::make($order);
    }
}
