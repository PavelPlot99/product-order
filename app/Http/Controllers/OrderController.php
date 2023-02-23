<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->paginate(20);

        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::query()->paginate(20);

        return view('order.create', compact('products'));
    }

    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $data['order']['user_id'] = Auth::user()->id;
        $count = $request->count;
        $products = $request->products;
        $result = [];
        foreach ($count as $key => $value ){
            $result[] = ['product_id' => $products[$key], 'count' => $value];
        }
        $order = Order::query()->create($data['order']);
        $order->products()->sync($result);

        return  redirect()->route('order.index');
    }

    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
