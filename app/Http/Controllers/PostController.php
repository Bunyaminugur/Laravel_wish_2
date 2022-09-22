<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
=======
use App\Http\Resources\PostShowResource;
>>>>>>> 43034bf505dfdd3136d0c335d7254424a17c5986
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
<<<<<<< HEAD
    public function show($community_slug, $slug) 
    {
        $community = Community::where('slug', $community_slug)->first();
        $post = Post::where('slug', $slug)->first();

        return Inertia::render('Posts/Show', compact('community', 'post'));
    }
}
=======
    public function show($community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->first();
        $post = new PostShowResource(Post::with('comments')->where('slug', $slug)->first());

        return Inertia::render('OneWish/Show', compact('community', 'post'));
    }
}
>>>>>>> 43034bf505dfdd3136d0c335d7254424a17c5986
