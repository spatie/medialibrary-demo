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




Route::get('using-media-conversions', function () {

    // Let's add some media conversions before running this

    Article::create()
        ->addMedia(storage_path('demo/museum.jpg'))
        ->toMediaCollection('images');
});


/*
Route::get('non-queued-conversions', function() {

    // Let's turn off the queues

    Article::create()
        ->addMedia(storage_path('demo/museum.jpg'))
        ->toMediaCollection('images');
});
*/


Route::get('optimized-images', function () {

    // Let's turn off the optimization

    Article::create()
        ->addMedia(storage_path('demo/museum.jpg'))
        ->toMediaCollection('images');
});


Route::get('pdf-conversions', function () {

    // We love PDFs too!

    Article::create()
        ->addMedia(storage_path('demo/nova-talk-notes.pdf'))
        ->toMediaCollection('downloads');
});


Route::get('customizing-the-path', function () {

    // Let's use a path generator

    Article::create()
        ->addMedia(storage_path('demo/museum.jpg'))
        ->toMediaCollection();
});


Route::get('using-s3', function () {
    Article::create()
        ->addMedia(storage_path('demo/museum.jpg'))
        ->toMediaCollection('images', 's3');
});


Route::get('defining-media-collections', function () {
    Article::create()
        ->addMedia(storage_path('demo/nova-talk-notes.pdf'))
        ->toMediaCollection('big-files');
});


Route::get('downloading-a-file', function () {
    $media = Article::create()
        ->addMedia(storage_path('demo/nova-talk-notes.pdf'))
        ->toMediaCollection();

    return $media;
});


Route::get('downloading-a-file-from-s3', function () {
    $media = Article::create()
        ->addMedia(storage_path('demo/nova-talk-notes.pdf'))
        ->toMediaCollection('downloads', 's3');

    return $media;
});


Route::get('downloading-multiple-files', function () {
    Media::truncate();

    Article::create()
        ->addMedia(storage_path('demo/museum.jpg'))
        ->toMediaCollection();

    Article::create()
        ->addMedia(storage_path('demo/nova-talk-notes.pdf'))
        ->toMediaCollection('downloads', 's3');

    return MediaStream::create('your-files.zip')->addMedia(Media::all());
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
