<?php

namespace App\Services;

use App\DTO\CreateProductDTO;
use App\Models\Product\Product;

class ProductService
{
    public static function store(CreateProductDTO $createProductDTO){

        return Product::create([
            'name' => $createProductDTO->name,
            'description' => $createProductDTO->description,
            'category_id' => $createProductDTO->category_id,
        ]);
    }
}
