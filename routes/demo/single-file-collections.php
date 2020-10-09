<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('add-avatar', function () {
    User::firstWhere('email', 'rick@spatie.be')
        ->addMedia(storage_path('demo/avatar-1.jpg'))
        ->toMediaCollection('avatar');
});

Route::get('update-avatar', function () {
    User::firstWhere('email', 'rick@spatie.be')
        ->addMedia(storage_path('demo/avatar-2.jpg'))
        ->toMediaCollection('avatar');
});
