<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        // Ambil kategori
        $categories = ProductCategory::where('status', 'active')
            ->withCount('products')
            ->get();

        // Mulai query produk
        $query = Product::with('category');

        // Filter pencarian berdasarkan nama produk atau deskripsi
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');

            $query->where(function ($q) use ($searchTerm) {
                $q->where('nama_produk', 'like', '%' . $searchTerm . '%')
                    ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%');
            });
        }

        // Filter kategori (multiple checkbox)
        if ($request->filled('category')) {
            $categorySlugs = $request->input('category');

            $categoryIds = ProductCategory::whereIn('slug', $categorySlugs)->pluck('id')->toArray();
            $query->whereIn('kategori_id', $categoryIds);
        }

        // Sorting
        switch ($request->sorting) {
            case 'lowest':
                $query->orderBy('harga', 'asc');
                break;
            case 'highest':
                $query->orderBy('harga', 'desc');
                break;
            case 'popular':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        // Ambil hasil akhir produk
        $products = $query->paginate(6)->withQueryString();

        return view('product', compact('categories', 'products'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $products = Product::with('category')
            ->where('nama_produk', 'like', '%' . $searchTerm . '%')
            ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%')
            ->paginate(6)
            ->withQueryString();


        $categories = ProductCategory::where('status', 'active')
            ->withCount('products')
            ->get();

        return view('product', compact('products', 'categories'));
    }
    public function searchheader(Request $request)
    {
        $searchTerm = $request->input('search');

        $products = Product::with('category')
            ->where('nama_produk', 'like', '%' . $searchTerm . '%')
            ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%')
            ->paginate(6)
            ->withQueryString();


        $categories = ProductCategory::where('status', 'active')
            ->withCount('products')
            ->get();

        return redirect()->route('products', ['search' => $searchTerm]);
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->with('category')->firstOrFail();

        return view('product_detail', compact('product'));
    }
}
