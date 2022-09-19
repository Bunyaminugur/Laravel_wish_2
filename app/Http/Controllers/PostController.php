<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function show($community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->first();
        $post = Post::where('slug', $slug)->first();

        return Inertia::render('OneWish/Show', compact('community', 'post'));
    }
}