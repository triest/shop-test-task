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
                            @role('customer')
                            <!-- Форма с явным указанием области действия -->
                            <form action="{{ route('order.add-item') }}" method="POST" class="d-inline" >
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group">
                                    <input type="number"
                                           name="quantity"
                                           value="1"
                                           min="1"
                                           max="{{ $product->quantity }}"
                                           class="form-control"
                                           required
                                           style="max-width: 80px">

                                </div>
                                <input type="submit">
                            </form>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $products->links() }}
    </div>
@endsection
