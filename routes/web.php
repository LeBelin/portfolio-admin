<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\DashboardController;
use App\Livewire\Articles\ArticleIndex;
use App\Livewire\Articles\ArticleCreate;
use App\Livewire\Articles\ArticleEdit;
use App\Livewire\Articles\ArticleShow;

use App\Livewire\Blogs\BlogIndex;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/register', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    // Route::view('articles', 'articles')
    // ->middleware(['auth', 'verified'])
    // ->name('articles');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get("articles", ArticleIndex::class)->name("articles.index");
    Route::get("articles/create", ArticleCreate::class)->name("articles.create");
    Route::get("articles/{id}/edit", ArticleEdit::class)->name("articles.edit");
    Route::get("articles/{id}", ArticleShow::class)->name("articles.show");

    Route::get("blogs", BlogIndex::class)->name("blogs.index");

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
