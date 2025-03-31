<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $pagelist = Product::where('category_id', 1)->take(4)->get();
        $pagelist2 = Product::where('category_id', 2)->take(4)->get();
        $pagelist3 = Product::where('category_id', 3)->take(4)->get();
        $pagelist4 = Product::where('category_id', 4)->take(4)->get();

        
        // $pagelist = product::where('category_id', 2)->take(4)->get();
        // $pagelist2 = product::where('category_id', 1)->take(4)->get();
        // $pagelist3 = product::where('category_id', 4)->take(4)->get();


        $data = [
            'pageList' => $pagelist,
            'pageList2' =>$pagelist2,
            'pageList3' =>$pagelist3,
            'pageList4' =>$pagelist4

        ];
        return view('page.home', $data);
    }
}
