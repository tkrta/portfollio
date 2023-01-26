<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index (Post $post)
        {
            return view('posts/index')-> with(['posts'=> $post->getPaginateByLimit()]);
        }
        
    public function create()
        {
            return view('/posts/create');
        }
    
    public function show (Post $post)
        {
            return view('posts/show')-> with(['post'=> $post]);
        }
    
    public function store (Post $post, PostRequest $request)
        {
            $input = $request['post'];
            $post-> fill($input)-> save();
            return redirect('/posts/' . $post->id);
        }
}
