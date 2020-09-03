<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;

Route::get('downloading-a-file', function () {
    $media = Article::create()
        ->addMedia(storage_path('demo/laravel-beyond-crud.pdf'))
        ->toMediaCollection();

    return $media;
});


Route::get('downloading-a-file-from-s3', function () {
    $media = Article::create()
        ->addMedia(storage_path('demo/laravel-beyond-crud.pdf'))
        ->toMediaCollection('downloads', 's3');

    return $media;
});


Route::get('downloading-multiple-files', function () {
    Media::truncate();

    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection();

    Article::create()
        ->addMedia(storage_path('demo/laravel-beyond-crud.pdf'))
        ->toMediaCollection('downloads', 's3');

    return MediaStream::create('your-files.zip')->addMedia(Media::all());
});
