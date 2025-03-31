<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'image', 'price', 'sale_price', 'description', 'quantity', 'rating', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
