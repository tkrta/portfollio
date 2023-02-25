<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stamp;
use App\Models\Todo;
use App\Models\User;
use Cloudinary;

class StampController extends Controller
{
    public function index (Stamp $stamp)
    {
        return view('/stamps/index')-> with(['stamps'=> $stamp-> getPaginateByLimit()]);
    }
        
    public function buy (Stamp $stamp, User $user)
    {
        $stamp-> users()-> attach(auth()-> user());
        $user['total_point'] -= $stamp['price'];
        return redirect('/stamps');
    }
        
    public function update (Stamp $stamp, Todo $todo)
    {
        $stamp-> users()-> attach(auth()-> user());
        $input = $stamp['id'];
        $todo['stamp_id']->fill($input)->save();
        return redirect('/stamps');
    }
    
}
