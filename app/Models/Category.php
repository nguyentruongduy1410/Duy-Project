<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    
    use HasFactory, SoftDeletes; // Thêm SoftDeletes nếu bạn có sử dụng

    protected $fillable = ['name', 'parent_id'];

    // Quan hệ với danh mục cha
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Quan hệ với danh mục con
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Quan hệ với sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
