<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController
{
    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        /** @var Article $article */
        $article = Article::create();

        $article
            ->addMediaFromRequest($request->image)
            ->toMediaCollection();

        return back();
    }
}
