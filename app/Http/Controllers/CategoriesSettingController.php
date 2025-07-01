<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoriesSettingController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $categories = ProductCategory::oldest()->get();
        return view('product_categories.index', compact('categories', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:product_categories,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'parent_id' => 'nullable|exists:product_categories,id',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['name', 'description', 'parent_id', 'status']);
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        ProductCategory::create($data);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }



    public function update(Request $request, $slug)
    {
        $category = ProductCategory::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|unique:product_categories,name,' . $category->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'parent_id' => 'nullable|exists:product_categories,id',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['name', 'description', 'parent_id', 'status']);
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('product_categories')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($slug)
    {
        $category = ProductCategory::where('slug', $slug)->firstOrFail();
        $category->delete();

        return redirect()->route('product_categories')->with('success', 'Kategori berhasil dihapus.');
    }
}
