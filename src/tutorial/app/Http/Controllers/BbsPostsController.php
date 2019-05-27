<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BbsPost;

class BbsPostsController extends Controller
{
    public function index()
    {
        $posts = BbsPost::orderBy('created_at', 'desc')->get();
        
        return view('bbs_posts.index', ['posts' => $posts]);
    }
}
