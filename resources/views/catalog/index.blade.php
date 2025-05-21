<!-- resources/views/catalog/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Catalog</h1>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="text-muted">Price: ${{ number_format($product->price, 2) }}</p>
                            <form action="{{ route('order.add-item') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group mb-3">
                                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->quantity }}"
                                           class="form-control" required>
                                    <button type="submit" class="btn btn-primary">Add to Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $products->links() }}
    </div>
@endsection
