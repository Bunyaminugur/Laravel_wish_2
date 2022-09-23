<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\CommunityPostResource;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $posts = CommunityPostResource::collection(Post::with(['user', 'community', 'postVotes' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->withCount('comments')->withCount('comments')->orderBy('votes', 'desc')->take(12)->get());

        return Inertia::render('Welcome', compact('posts'));
    }
}
