<?php

use App\Models\Article;

Route::get('using-collections', function () {

    $article = Article::create();

    $article
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaLibrary();

    $article
        ->addMedia(storage_path('demo/library-stuttgart.jpg'))
        ->toMediaCollection('images');

    $article
        ->addMedia(storage_path('demo/laravel-beyond-crud.pdf'))
        ->toMediaCollection('downloads');
});
