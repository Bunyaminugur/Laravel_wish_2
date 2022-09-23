<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommunityPostResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WishController extends Controller
{
    public function show($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        $posts = CommunityPostResource::collection($community->posts()->with(['user', 'postVotes' => function($query){
            $query->where('user_id', auth()->id());
        }])->withCount('comments')->paginate(3));

        return Inertia::render('Wish/Show', compact('community', 'posts'));
    }
}
