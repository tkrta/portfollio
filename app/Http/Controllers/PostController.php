<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Models\Reply;
use Cloudinary;

class PostController extends Controller
{
    public function index (Post $post)
        {
            return view('posts/index')-> with(['posts'=> $post->getPaginateByLimit()]);
        }
    
    public function show (Post $post, Reply $reply)
        {
            $replies = $reply->where('post_id', $post->id)->paginate();
            return view('posts/show')-> with(['post'=> $post, 'replies'=>$replies]);
        }
        
    public function create()
        {
            return view('/posts/create');
        }
    
    public function store(Post $post, PostRequest $request)
        {
            $input = $request['post'];
            $input["user_id"] = auth()->id();
            $post->fill($input)->save();
            return redirect('/posts/' . $post->id);
        }
        
    public function edit (Post $post)
        {
            return view('posts/edit')-> with(['post'=> $post]);
        }
        
    public function update (PostRequest $request, Post $post)
        {
            $input_post = $request['post'];
            $post-> fill($input_post)->save();
            return redirect('/posts/' . $post-> id);
        }
        
    public function delete(Post $post)
        {
            $post->delete();
            return redirect('/posts');
        }
    
    public function like (Post $post)
        {
            $post->users()->attach(auth()->user());
            return redirect('/posts');
        }
    
    public function unlike (Post $post)
        {
            $post->users()->detach(auth()->user());
            return redirect('/posts');
        }    
}
