<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('defining-media-collections', function () {
    Article::create()
        ->addMedia(storage_path('demo/laravel-beyond-crud.pdf'))
        ->toMediaCollection('big-files');
});
