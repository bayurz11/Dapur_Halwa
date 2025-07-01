<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::where('status', 'active')
            ->withCount('products')
            ->get();

        $products = Product::all();
        return view('product', compact('categories', 'products'));
    }
}
