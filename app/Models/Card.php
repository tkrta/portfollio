<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    
    protected $fillable =[
            'color',
            'price',
        ];
        
    public function getPaginateByLimit (int $limit_count = 10)
    {
        return $this-> orderBy('updated_at', 'DESC')-> paginate($limit_count);
    } 
    
    public function users ()
    {
        return $this-> belongsToMany(User::class, 'card_user', 'card_id', 'user_id');
    }
    
        //適用中かどうか
    public function setting ()
    {
        if (Todo::where('user_id', '=', auth()->user()->id)->orderBy('updated_at', 'DESC')->first()->card_id == $this->id) {
            return true;
        }
        return false;
    }
    
    //購入済かどうか
    public function isBought ()
    {
        foreach (auth()-> user()-> bought_cards as $card)
        {
            if ($card-> id == $this-> id) {
                return true;
            }
            return false;
        }
    }
        
    //購入できるかどうか
    public function canBuy ()
    {
        if(auth()->user()->total_point >= $this->price) {
            return true;
        }
        return false;
    }
    
    public function todos ()
    {
        return $this->hasMany(Todo::class);
    }
}
