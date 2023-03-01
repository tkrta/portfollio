<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Todo;
use App\Models\User;


class CardController extends Controller
{
    public function index (Card $card)
    {
        return view('/cards/index')-> with(['cards'=> $card-> getPaginateByLimit()]);
    }
        
    public function buy (Card $card, User $user)
    {
        $user = auth()->user();
        $card-> users()-> attach(auth()-> user());
        $user['total_point'] -= $card['price'];
        $user->save();
        return redirect('/cards');
    }
        
    public function update (Card $card)
    {
        $todo = Todo::orderBy("updated_at", "DESC")->first();
        if ($todo == null) {
            return redirect('/cards');
        }
        $todo->card_id  = $card->id;
        $todo->save();
        return redirect('/cards');
    }
    
}
