<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'tags')->paginate(6);
        return view('products.shop', compact('products'));
    }

    public function show()
    {
        return view('products.show');
    }
}
