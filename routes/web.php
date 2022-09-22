<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostVoteController;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/w/{slug}', [WishController::class, 'show'])->name('wish.show');
<<<<<<< HEAD
Route::get('/w/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('communities.posts.show');
=======
Route::get('/w/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('onewish.show');
Route::post('/w/{community_slug}/posts/{post:slug}/comments', [PostCommentController::class, 'store'])->name('wish.comments');
>>>>>>> 43034bf505dfdd3136d0c335d7254424a17c5986

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/communities', CommunityController::class);
    Route::resource('/communities.posts', CommunityPostController::class);

    Route::post('/posts/{post:slug}/upVote', [PostVoteController::class, 'upVote'])->name('posts.upVote');
    Route::post('/posts/{post:slug}/downVote', [PostVoteController::class, 'downVote'])->name('posts.downVote');
});

require __DIR__.'/auth.php';