<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cloudinary;

class Stamp extends Model
{
    use HasFactory;
    
    protected $fillable =[
            'image_path',
            'name',
            'price',
        ];
        
    public function getPaginateByLimit (int $limit_count = 10)
    {
        return $this-> orderBy('updated_at', 'DESC')-> paginate($limit_count);
    } 
    
    public function users ()
    {
        return $this-> belongsToMany(User::class, 'stamp_user', 'stamp_id', 'user_id');
    }
    
        //適用中かどうか
    public function setting ()
    {
        if (Todo::where('user_id', '=', auth()->user()->id)->orderBy('updated_at', 'DESC')->first()->stamp_id == $this->id) {
            return true;
        }
        return false;
    }
        
        //購入済かどうか
    public function isBought ()
    {
        foreach (auth()-> user()-> bought_stamps as $stamp)
        {
            if ($stamp-> id == $this-> id) {
                return true;
            }
            
        
        }
        return false;
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
