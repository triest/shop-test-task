<!-- resources/views/order/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Current Order</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

         Создан: {{$order->created_at}} <br>
         Статус: {{$order->status->name}}

        <form method="POST" action="{{ route('order.update',['order' => $order]) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="status_id" value="{{$status->id}}">
            <input type="submit">
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
                @foreach($order->orderProducts as $orderProduct)
                <tr>
                    <td>{{ $orderProduct->product->name }}</td>
                    <td>${{ number_format($orderProduct->product->price, 2) }}</td>
                    <td>{{ $orderProduct->quantity }}</td>
                    <td>${{ number_format($orderProduct->product->price * $orderProduct->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="3">Total:</th>
                <th>${{ number_format($order->total(), 2) }}</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
