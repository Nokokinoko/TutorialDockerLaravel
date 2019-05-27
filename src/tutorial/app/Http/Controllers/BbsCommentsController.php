<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BbsPost;

class BbsCommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'bbs_post_id' => 'required|exists:bbs_posts,id',
            'body' => 'required|max:2000',
        ]);
        
        $post = BbsPost::findOrFail($params['bbs_post_id']);
        $post->comments()->create($params);
        
        return redirect()->route('bbs_posts.show', ['post' => $post]);
    }
}
