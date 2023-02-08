<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stamp;
use App\Models\User;
use Cloudinary;

class StampController extends Controller
{
    public function index (Stamp $stamp)
    {
        return view('/stamps/index')-> with(['stamps'=> $stamp-> getPaginateByLimit()]);
    }
        
    public function buy (Stamp $stamp)
    {
        $stamp-> users()-> attach(auth()-> user());
        $user['total_point'] -= $stamp['price'];
        return redirect('/stamps');
    }
        
    public function update (Stamp $stamp, Todo $todo)
    {
        $input = $request['stamp'->id];
        $todo['stamp_id']->fill($input)->save();
        return redirect('/stamps');
    }
}
