<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController
{
    public function create()
    {
        return view('article.create');
    }

    public function store()
    {
        /** @var Article $article */
        $article = Article::create();

        $article
            ->addMediaFromRequest('image')
            ->toMediaCollection();

        return back();
    }
}
