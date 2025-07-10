<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\Articles;
use Illuminate\Support\Facades\Auth;

class ArticlesSettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = ArticleCategory::all();
        $articles = Articles::with(['category', 'author'])->get();
        return view('article.index', compact('categories', 'user', 'articles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required',
            'category_id' => 'required|exists:article_categories,id',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->only([
            'title',
            'content',
            'category_id',
            'status',
            'published_at'
        ]);

        // Generate slug otomatis dari title
        $slug = Str::slug($request->title);

        // Pastikan slug unik (jika perlu tambahkan suffix angka jika sudah ada)
        $originalSlug = $slug;
        $counter = 1;
        while (Articles::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $data['slug'] = $slug;
        $data['author_id'] = Auth::id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Articles::create($data);

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan.');
    }
}
