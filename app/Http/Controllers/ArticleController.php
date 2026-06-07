<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
public function index(Request $request)
    {
        $query = Article::query();

        // Fitur Pencarian berdasarkan nama/title atau isi konten
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }

        // Fitur Urutkan (Sorting) berdasarkan nama A-Z / Z-A
        if ($request->has('sort')) {
            $sortOrder = $request->sort == 'desc' ? 'desc' : 'asc';
            $query->orderBy('title', $sortOrder);
        } else {
            $query->latest(); // Default sorting
        }

        $articles = $query->paginate(10)->withQueryString();

        return view('articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::with('comments')->where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }
}