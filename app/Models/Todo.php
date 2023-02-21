<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
                
                'card_id',
                'progress',
                'stamp_id',
                'todo',
                'user_id',
            ];
    
    public function users ()
    {
        return $this->belongsTo(User::class);
    }
    
    public function card ()
    {
        return $this->belongsTo(Card::class);
    }
    
    public function stamp ()
    {
        return $this->belongsTo(Stamp::class);
    }
    
    public function lasttodo ()
    {
        if($this->where('user_id', '=', auth()->user()->id)->exists()) {
            return $this->where('user_id', '=', auth()->user()->id)->orderBy('updated_at', 'DESC')->first();
        } 
            
    }
}
