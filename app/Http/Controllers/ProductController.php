<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        if($request->has('utm')) {
            session(['utm' => $request->get('utm')]);
        }

        return view('product', [
            "products" => $products,
            "utm" => $request->get("utm")
        ]);
    }

    public function show(Product $id, Request $request)
    {
        $product = $id;

        if($request->has('utm')) {
            session(['utm' => $request->get('utm')]);
        }
        
        return view('detail', [
            "product" => $product,
            "utm" => session('utm')
        ]);
    }
}
