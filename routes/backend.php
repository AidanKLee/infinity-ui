<?php

use App\Livewire\Pages\Backend\Dashboard;
use App\Livewire\Pages\Backend\Pages;
use Illuminate\Support\Facades\Route;

Route::prefix(config('app.backend'))->group(function () {
    Route::get('/', Dashboard::class)->name('backend');
    Route::get('/pages', Pages::class)->name('backend.pages');
});