<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;

class HistoryController extends Controller
{
    
    
    public function index (Todo $todo, User $user)
    {
        if($todo->where('user_id', '=', auth()->user()->id)->exists()) {
            $history = $todo->where('user_id', '=', auth()->user()->id)->where('progress', '>=', 30)->orderBy('updated_at', 'DESC')->get();
            return view('history/index')->with(['histories'=>$history]);
        }
            $history = $todo->where('user_id', '=', auth()->user()->id)->where('progress', '>=', 30)->orderBy('updated_at', 'DESC')->get();
            return view('history/index')->with(['histories'=>$history]);
    
    
        
    }
}
