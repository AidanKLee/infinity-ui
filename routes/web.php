<?php

use App\Livewire\Pages\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/reset-password', Home::class)->name('password-reset');

if (config('app.env') === 'local') {
    Route::get('/401', function () {
        return abort(401);
    })->name('401');
    
    Route::get('/403', function () {
        return abort(403);
    })->name('403');
    
    Route::get('/404', function () {
        return abort(404);
    })->name('404');
    
    Route::get('/419', function () {
        return abort(419);
    })->name('419');
    
    Route::get('/429', function () {
        return abort(429);
    })->name('429');
    
    Route::get('/500', function () {
        return abort(500);
    })->name('500');
    
    Route::get('/503', function () {
        return abort(503);
    })->name('503');
}

require __DIR__.'/backend.php';