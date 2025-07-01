<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // Menampilkan halaman home
    public function index()
    {
        $categories = ProductCategory::where('status', 'active')
            ->withCount('products') // hitung relasi 'products' untuk setiap kategori
            ->get();

        $products = Product::all();

        return view('home', compact('categories', 'products'));
    }


    // Ganti bahasa berdasarkan parameter dan simpan di session
    public function changeLanguage($lang)
    {
        // Validasi bahasa yang didukung
        $availableLangs = ['en', 'id'];

        if (in_array($lang, $availableLangs)) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }

        return redirect()->back();
    }
}
