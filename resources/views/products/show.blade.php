@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Product</h1>

        <form action="{{ route('product.update',['product'=>$product]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product->nama}}" required readonly>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
               {{$product->description}}
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required value="{{$product->price}}" readonly>
            </div>

            <div class="mb-3">
                <select name="category_id" id="category_id" id="pet-select" readonly>
                    @foreach($categories as $categoriey)
                        <option value="{{$categoriey->id}}" @if($categoriey->id===$product?->category?->id) selected @endif>{{$categoriey->name}}</option>

                    @endforeach
                </select>
            </div>

        </form>
    </div>
@endsection
