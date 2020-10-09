<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('step-1-add-media-to-models', function () {
    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection();
});

Route::get('step-2-delete-models', function () {
    Article::all()->each->delete();
});
