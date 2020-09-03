<?php

use App\Models\Article;

Route::get('send-a-file-to-s3', function () {
    Article::create()
        ->addMedia(storage_path('demo/library-dublin.jpg'))
        ->toMediaCollection('images', 's3');
});
