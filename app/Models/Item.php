<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'price', 'order_id'];

    public function order(){
        return $this->belongTo(Order::class);
    }

    public function product(){
        return $this->belongTo(Product::class);
    }
}
