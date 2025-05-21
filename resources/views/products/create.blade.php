@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Product</h1>

        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <select class="form-select" name="category_id" id="category_id" id="pet-select">
                    @foreach($categories as $categoriey)
                        <option value="{{$categoriey->id}}">{{$categoriey->name}}</option>
                    @endforeach
                </select>
            </div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
