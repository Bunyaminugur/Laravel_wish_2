<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityPostController extends Controller
{
    public function create(Community $community)
    {
        return Inertia::render('Communities/Posts/Create',compact('community'));
    }
}
