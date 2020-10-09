<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('changed-conversions', function () {

    // let's change the conversions

    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection('images');
});
