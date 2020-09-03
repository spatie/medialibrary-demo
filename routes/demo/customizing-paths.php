<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('customizing-path', function () {

    // let's use a path generator

    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection('images');
});
