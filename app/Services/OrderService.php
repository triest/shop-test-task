<?php

namespace App\Services;

use App\DTO\OrderUpdateDTO;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;

class OrderService
{

    public static function index()
    {

        $orders = Order::query()->where('user_id', Auth::id())->get();

        return $orders;
    }

    public static function addItem(Product $product, $quantity)
    {
        $user = Auth::user();

        $orderStatus = OrderStatus::query()->where('slug', OrderStatus::STATUS_NEW)->first();


        $order = Order::query()->whereHas('user', function ($query) {
            $query->where('id', Auth::id());
        })->whereHas('status', function ($query) {
            $query->where('slug', OrderStatus::STATUS_NEW);
        })->first();

        if (!$order) {
            $order = new Order();
            $order->user()->associate($user);
            $order->status()->associate($orderStatus);
            $order->save();
        }

        $orderProduct = OrderProduct::query()->whereHas('order', function ($query) use ($order) {
            $query->where('id', $order->id);
        })->whereHas('product', function ($query) use ($product) {
            $query->where('id', $product->id);
        })->first();

        if (!$orderProduct) {
            $orderProduct = new OrderProduct();
        }

        $orderProduct->order()->associate($order);
        $orderProduct->product()->associate($product);
        $orderProduct->quantity = $quantity;
        $orderProduct->save();


        $order->save();

        return redirect()->route('order.index')
            ->with('success', 'Product added to order');

    }

    public static function update(Order $order, OrderUpdateDTO $orderUpdateDTO)
    {
        $status = OrderStatus::query()->where('id', $orderUpdateDTO->status_id)->first();

        if(!$status){
            throw new \Exception('Order status not found');
        }

        $order->status()->associate($status);

        $order->save();

        return $order;
    }
}
