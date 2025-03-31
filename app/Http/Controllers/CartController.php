<?php

namespace App\Http\Controllers;

use App\Models\product;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        $products = [];
        foreach ($cart as $item) {
            $product = product::find($item['id']);
            if ($product) {
                $products[] = [
                    "id" => $product->id,
                    "name" => $product->name,
                    "slug" => $product->slug,
                    "image" => $product->image,
                    "price" => $product->price,
                    "quantity" => $item['quantity'],
                    "total_price" => $product->price * $item['quantity'],

                ];
            }
        }
        return view('cart.index', compact('products'));
    }
    public function checkout()
    {
        $currentUser = Auth::user();
        $cart = Session::get('cart', []);
        $productIds = array_column($cart, 'id');
        $products = product::whereIn('id', $productIds)->get();
        foreach ($products as $product) {
            foreach ($cart as $item) {
                if ($product->id == $item['id']) {
                    $product->quantity = $item['quantity'];     
                    break;
            }
        }   
        
    } 
    $total_price = $products->sum(fn($product) => $product->price * $product->quantity);

    return view('cart.checkout',compact('products', 'total_price','currentUser'));
    // return view('cart.checkout',compact('products', 'total_price'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Session::exists('cart')) {
            Session::put('cart', []);
        }

        $cart = Session::get('cart');
        $incart = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $request->id) {
                $item['quantity'] += $request->quantity;
                Session::put('cart', $cart);
                $incart = true;
                break;
            }
        }


        if (!$incart) {
            Session::push('cart', [
                "id" => $request->id,
                "quantity" => $request->quantity,
            ]);
        }
        $product = product::find($request->id);
        return redirect('/detail/' . $product->slug)->with('succcess', 'Sản phẩm đã được thêm');
    }
    public function updateQuantity(Request $request, $id)
    {
        $cart = Session::get('cart', []);
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = max(1, $item['quantity'] + $request->change); // Đảm bảo không nhỏ hơn 1
                break;
            }
        }
        Session::put('cart', $cart);
        return response()->json(['success' => true]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Session::get('cart', []);
        $cart = array_filter($cart, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }
}
