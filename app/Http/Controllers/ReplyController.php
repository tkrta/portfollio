<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Post;
use App\Http\Requests\ReplyRequest;

class ReplyController extends Controller
{
    public function index (Reply $reply)
    {
        return view('posts/show')-> with(['replies'=> $reply->getPaginateByLimit()]);
    }
        
    public function show (Post $post, Reply $reply)
    {
        return view('replies/show')-> with(['reply'=> $reply, 'post'=> $post]);
    }
        
    public function create (Post $post)
    {
        return view('replies/create')->with(['post'=> $post]);
    }    
        
    public function store (ReplyRequest $request, Reply $reply, Post $post)
    {
        $input = $request['reply'];
        $input['post_id'] = $post->id;
        $input['user_id'] = auth()->user()->id;
        $reply->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
        
    public function edit (Post $post, Reply $reply)
    {
        return view('replies/edit')->with(['reply'=> $reply, 'post'=> $post]);
    }
        
    public function update (Post $post, Reply $reply, ReplyRequest $request)
    {
        $input_reply = $request['reply'];
        $reply->fill($input_reply)->save();
        return redirect('/posts/' . $post->id);
    }
        
    public function delete(Post $post, Reply $reply)
    {
        $reply->delete();
        return redirect('/posts/' . $post->id);
    }
}
