<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index (Card $card)
    {
        return view('/cards/index')-> with(['cards'=> $card-> getPaginateByLimit()]);
    }
        
    public function buy (Card $card, User $user)
    {
        $card-> users()-> attach(auth()-> user());
        $user['total_point'] -= $card['price'];
        $user->save();
        return redirect('/cards');
    }
        
    public function update (Card $card, Todo $todo)
    {
        $input = $card['id'];
        $todo['card_id']-> fill($input)-> save();
        return redirect('/cards');
    }
    
}
