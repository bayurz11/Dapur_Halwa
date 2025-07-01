<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'parent_id',
        'status',
    ];
    protected $table = 'product_categories';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id');
    }
}
