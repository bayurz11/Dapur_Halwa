<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::with(['category', 'author'])
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(2);
        return view('articles', compact('articles'));
    }
}
