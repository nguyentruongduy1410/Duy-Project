<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'payment_method', 'payment_status', 'status', 'note'];
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class,  'order_id', 'product_id');
    // }
    
}
