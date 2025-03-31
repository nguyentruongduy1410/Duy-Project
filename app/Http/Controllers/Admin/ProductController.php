<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->input('category_id');
        $query = Product::query();
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
    
        $products = $query->paginate(10)->appends(['category_id' => $categoryId]); // Giữ bộ lọc khi chuyển trang
        return view('admin.products', compact('products', 'categories', 'categoryId'));
    }
}
