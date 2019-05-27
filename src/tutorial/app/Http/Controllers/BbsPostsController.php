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
    
    public function create()
    {
        return view('bbs_posts.create');
    }
    
    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);
        
        BbsPost::create($params);
        
        return redirect()->route('bbs_top');
    }
}
