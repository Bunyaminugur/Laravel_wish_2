<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WishController extends Controller
{
    public function show($slug)
    {
        $wish = Community::where('slug', $slug)->first();

        return Inertia::render('Wish/Show', compact('wish'));
    }
}
