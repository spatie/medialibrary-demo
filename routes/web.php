<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('add-media-to-library', function () {
    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection();
});

Route::get('add-multiple-files-media-to-library', function () {
    $article = Article::create();

    $article
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection();

    $article
        ->addMedia(storage_path('demo/library-stuttgart.jpg'))
        ->toMediaCollection();
});

Route::get('add-media-from-request', [ArticleController::class, 'create']);
Route::post('add-media-from-request', [ArticleController::class, 'store']);


Route::get('using-collections', function () {

    // Use the collection, Luke!

    $article = Article::create();

    $article
        ->addMedia(storage_path('demo/museum.jpg'))
        ->toMediaCollection('images');

    $article
        ->addMedia(storage_path('demo/nova-talk-notes.pdf'))
        ->toMediaCollection('downloads');
});



/*
Route::get('non-queued-conversions', function() {

    // Let's turn off the queues

    Article::create()
        ->addMedia(storage_path('demo/museum.jpg'))
        ->toMediaCollection('images');
});
*/

Route::get('pdf-conversions', function () {

    // We love PDFs too!

    Article::create()
        ->addMedia(storage_path('demo/nova-talk-notes.pdf'))
        ->toMediaCollection('downloads');
});


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
