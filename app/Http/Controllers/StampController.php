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
        $user = auth()->user();
        $stamp-> users()-> attach(auth()-> user());
        $user['total_point'] -= $stamp['price'];
        $user->save();
        return redirect('/stamps');
    }
        
    public function update (Stamp $stamp)
    {
        $todo = Todo::orderBy("updated_at", "DESC")->first();
        if ($todo == null) {
            return redirect('/stamps');
        }
        $todo->stamp_id  = $stamp->id;
        $todo->save();
        return redirect('/stamps');
    }
    
}
