<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
        public function index()
    {
        $post = Post::firstOrFail();

        return view('welcome', compact('post'));
    }
}
