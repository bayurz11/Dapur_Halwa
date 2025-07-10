<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticlesCategoriesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = ArticleCategory::all();
        return view('article_categories_setting.index', compact('categories', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100|unique:article_categories,name',

        ]);

        // Simpan ke database
        ArticleCategory::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),

        ]);

        return redirect()->back()->with('success', 'Kategori artikel berhasil ditambahkan.');
    }
    public function update(Request $request, $slug)
    {
        $category = ArticleCategory::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:100|unique:article_categories,name,' . $category->id,
        ]);

        // Update kategori
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back()->with('success', 'Kategori artikel berhasil diperbarui.');
    }
    public function destroy($slug)
    {
        $category = ArticleCategory::where('slug', $slug)->firstOrFail();
        $category->delete();

        return redirect()->back()->with('success', 'Kategori artikel berhasil dihapus.');
    }
}
