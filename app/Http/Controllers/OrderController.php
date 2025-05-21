<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\DTO\OrderUpdateDTO;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\Product\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(){
        $orders = OrderService::index();

        return view('order.index', compact('orders'));
    }
    public function addItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);


        $product = Product::find($request->product_id);
        OrderService::addItem($product, $request->quantity);

        return redirect()->route('order.index')
            ->with('success', 'Product added to order');

    }

    public function show(Order $order)
    {
        $user = Auth::user();

        if (!$user) {
            throw new \Exception('user not fiund');
        }

        $status = OrderStatus::query()->where('slug',OrderStatus::STATUS_COMPLETED)->first();

        return view('order.show', compact('order', 'status'));
    }

    public function update(Order $order, UpdateOrderRequest $request){
        $order = OrderService::update($order,new OrderUpdateDTO(...$request->validated()));

        return redirect()->route('order.show', compact('order'));
    }


}
