<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('generating-responsive-images', function () {
    Article::create()
        ->addMedia(storage_path('demo/museum.jpg'))
        ->withResponsiveImages()
        ->toMediaCollection();
});

Route::get('showing-responsive-images', function () {
    $media = Article::last()->getFirstMedia();

    return view('showing-responsive-images', compact('media'));
});
