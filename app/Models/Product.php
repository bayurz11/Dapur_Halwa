<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama_produk',
        'slug',
        'kategori_id',
        'deskripsi',
        'komposisi',
        'harga',
        'berat',
        'satuan',
        'stok',
        'foto_utama',
        'foto_lainnya',
        'rating',
        'status',
        'promo',
        'produk_terlaris',
        'tampilkan_di_beranda',
        'tanggal_kadaluarsa',
    ];

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $guarded = [];

    // Generate slug otomatis saat membuat produk
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->nama_produk);
            }
        });

        static::updating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->nama_produk);
            }
        });
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'kategori_id');
    }
}
