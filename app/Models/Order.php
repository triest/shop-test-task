<?php

namespace App\Models;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function total()
    {
        $orderProducy = $this->orderProducts;

        $sum = 0;

        foreach ($orderProducy as $orderProduct) {
            $sum += $orderProduct->quantity * $orderProduct->product->price;
        }

        return $sum;
    }

}
