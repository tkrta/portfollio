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
        
    public function create ()
        {
            return view('replies/create');
        }
        
    public function show (Reply $reply)
        {
            return view('replies/show')-> with(['reply'=> $reply]);
        }
        
    public function store (ReplyRequest $request, Reply $reply)
        {
            $input = $request['reply'];
            $reply->fill($input)->save();
            return redirect('/posts/{post}/' . $reply->id);
        }
}
