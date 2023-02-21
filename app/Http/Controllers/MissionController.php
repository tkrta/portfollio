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
    public function index (Card $card, Post $post, Stamp $stamp, User $user)
    {
        dd($this->point());
        return view('missions/index')->with(['card'=>$card, 'missions'=>$this, 'post'=>$post, 'stamp'=>$stamp, 'user'=>$user]);
    }
    
    public function point (User $user)
    {
        $user = auth()->user();
        $user['total_point'] += 10;
        return $user->save();
    }
    
    
}
