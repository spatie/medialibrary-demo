<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('not-preserving-original', function() {
    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection();
});

Route::get('preserving-original', function() {
    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->preservingOriginal()
        ->toMediaCollection();
});

Route::get('other-options', function() {
    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->usingName('A beautiful library in Dublin')
        ->usingFileName('other-name.jpg')
        ->withCustomProperties([
            'location' => 'Dublin, Ireland',
            'subject' => 'Library',
        ])
        ->toMediaCollection();
});
