<!-- resources/views/order/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Current Order</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order?->status?->name }}</td>
                    <td><a href="{{route('order.show',['order'=> $order->id])}}">{{ $order->created_at }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
