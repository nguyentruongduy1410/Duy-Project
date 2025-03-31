<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug){
        $product = product::where('slug', $slug)-> first();
        $product_category = Category::all();

        $data = [
            "product" => $product,
            "product_category" => $product_category
        ];
        return view('product.detail', $data);
    }
    public function allproduct(Request $request, $categoryId = null){  
        $keyword = $request->input('keyword');
        $categories = Category::all();
        if ($keyword) {
            $products = product::where('name', 'LIKE', "%$keyword%")->paginate(6);
        } else {
            $products = product::paginate(8);
        }
        return view('product.allproduct', compact('products', 'keyword', 'categories'));
    }
    public function categoryProducts($category_id, Request $request)
    {
        // $category_id = $request->route('id');
        $category_id_name = Category::find($request->route('id'));
        // $category = Category::find($category_id);
        // $categories = Category::all();
        // $products = Product::where('category_id', $category_id)->paginate(6);

        // return view('product.allproduct', compact('products', 'category', 'categories'));


        $category = Category::with('parent')->findOrFail($category_id);
        $categories = Category::all();
        $products = Product::where('category_id', $category_id)->paginate(6);

        return view('product.allproduct', compact('products', 'category', 'categories','category_id_name'));


    }
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $categories = Category::all(); // Lấy danh mục
    
        if ($keyword) {
            $products = Product::where('name', 'LIKE', "%$keyword%")->paginate(6);
        } else {
            $products = Product::paginate(6);
        }
    
        return view('product.allproduct', compact('products', 'keyword', 'categories'));
    }
    public function searchSuggestions(Request $request){
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%$keyword%")->limit(3)->get();
        return response()->json($products);

    }

}
