<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('add-media-to-library', function() {
    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection();
});

Route::get('add-media-from-request', [ArticleController::class, 'create']);
Route::post('add-media-from-request', [ArticleController::class, 'store']);

