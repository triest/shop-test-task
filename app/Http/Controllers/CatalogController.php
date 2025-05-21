<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;

class CatalogController
{
    public function index()
    {
        $products = Product::query()->paginate(12);
        return view('catalog.index', compact('products'));
    }
}
