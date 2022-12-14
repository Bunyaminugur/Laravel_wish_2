<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostShowResource;

class PostController extends Controller
{

    public function show($community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->first();
        $post = new PostShowResource(Post::with('comments')->where('slug', $slug)->first());


        $posts = PostResource::collection($community->posts()->orderBy('votes', 'desc')->take(6)->get());

        return Inertia::render('OneWish/Show', compact('community', 'post', 'posts'));
    }
}