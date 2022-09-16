<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommunityPostController;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/w/{slug}', [WishController::class, 'show'])->name('wish.show');
Route::get('/w/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('communities.posts.show');

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/dashboard/communities', CommunityController::class);
    Route::resource('/dashboard/communities.posts', CommunityPostController::class);
});

require __DIR__.'/auth.php';
