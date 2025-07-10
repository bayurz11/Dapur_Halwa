<?php

namespace App\Models;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'category_id',
        'author_id',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];


    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    // Relasi ke penulis (user)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Scope untuk artikel yang sudah diterbitkan
    public function scopePublished($query)
    {
        return $query->where('status', 'published')->whereNotNull('published_at');
    }
}
