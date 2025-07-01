<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductSettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::with('category')->latest()->get();
        $categories = ProductCategory::all();
        return view('product_setting.index', compact('user', 'products', 'categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_produk' => 'required|string|max:150|unique:products,nama_produk',
            'kategori_id' => 'required|exists:product_categories,id',
            'deskripsi' => 'nullable|string',
            'komposisi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'berat' => 'nullable|integer|min:0',
            'satuan' => 'nullable|string|max:50',
            'stok' => 'nullable|integer|min:0',
            'foto_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto_lainnya.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);


        $fotoUtamaPath = null;
        if ($request->hasFile('foto_utama')) {
            $fotoUtamaPath = $request->file('foto_utama')->store('produk/foto_utama', 'public');
        }

        $fotoLainnyaPaths = [];
        if ($request->hasFile('foto_lainnya')) {
            foreach ($request->file('foto_lainnya') as $foto) {
                $path = $foto->store('produk/foto_lainnya', 'public');
                $fotoLainnyaPaths[] = $path;
            }
        }

        $product = Product::create([
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'komposisi' => $request->komposisi,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'satuan' => $request->satuan ?? 'pcs',
            'stok' => $request->stok ?? 0,
            'foto_utama' => $fotoUtamaPath,
            'foto_lainnya' => $fotoLainnyaPaths ? json_encode($fotoLainnyaPaths) : null,
            'status' => $request->status,
        ]);

        return redirect()->route('product_setting')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama_produk' => 'required|string|max:150|unique:products,nama_produk,' . $product->id,
            'kategori_id' => 'required|exists:product_categories,id',
            'deskripsi' => 'nullable|string',
            'komposisi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'berat' => 'nullable|integer|min:0',
            'satuan' => 'nullable|string|max:50',
            'stok' => 'nullable|integer|min:0',
            'foto_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        if ($request->hasFile('foto_utama')) {
            if ($product->foto_utama) {
                Storage::disk('public')->delete($product->foto_utama);
            }
            $product->foto_utama = $request->file('foto_utama')->store('produk/foto_utama', 'public');
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'komposisi' => $request->komposisi,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'status' => $request->status,
        ]);

        return redirect()->route('product_setting')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Hapus foto utama jika ada
        if ($product->foto_utama) {
            Storage::disk('public')->delete($product->foto_utama);
        }

        // Hapus semua foto lainnya jika ada
        if ($product->foto_lainnya) {
            $fotoLainArray = json_decode($product->foto_lainnya, true);
            if (is_array($fotoLainArray)) {
                foreach ($fotoLainArray as $fotoPath) {
                    Storage::disk('public')->delete($fotoPath);
                }
            }
        }

        // Hapus data produk dari DB
        $product->delete();

        return redirect()->route('product_setting')->with('success', 'Produk berhasil dihapus.');
    }
}
