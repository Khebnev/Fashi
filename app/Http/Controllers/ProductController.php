<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
