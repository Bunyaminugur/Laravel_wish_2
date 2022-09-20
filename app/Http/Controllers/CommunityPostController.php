<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Redirect;

class CommunityPostController extends Controller
{
    public function create(Community $community)
    {
        return Inertia::render('Communities/Posts/Create',compact('community'));
    }

    public function store(StorePostRequest $request, Community $community)
    {
        $community->posts()->create([
            'user_id'=>auth()->id(),
            'title'=>$request->title,
            'url'=>$request->url,
            'description'=>$request->description,
        ]);

        return Redirect::route('wish.show', $community->slug);
    }

    public function edit(Community $community, Post $post)
    {
        $this->authorize('update', $post);
        return Inertia::render('Communities/Posts/Edit', compact('community', 'post'));
    }

    public function update(StorePostRequest $request, Community $community, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->validated());

        return Redirect::route('onewish.show', [$community->slug, $post->slug]);
    }

    public function destroy(Community $community, Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return Redirect::route('wish.show', $community->slug);
    }
}
