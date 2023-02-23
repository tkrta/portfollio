<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Post;
use App\Models\Stamp;
use App\Models\Todo;
use App\Models\User;


class MissionController extends Controller
{
    public function index (Card $card, Post $post, Stamp $stamp)
    {
        
        return view('missions/index')->with(['missions'=>$this]);
    }
    
    public function point ()
    {
        $user = auth()->user();
        $user['total_point'] += 10;
        $user->save();
        return redirect('/missions');
    }
    
    public function loggedin ()
    {
        return User::where('id', '=', auth()->user()->id)->exists();
    }
    
    public function progressed ()
    {
        return Todo::where('user_id', '=', auth()->user()->id)->where('progress', '>=', 30)->exists();
    }
    
    public function postcounts ()
    {
        return Post::where('user_id', '=', auth()->user()->id)->where('user_id', '>=', 1)->exists();
    }
    
    
}
