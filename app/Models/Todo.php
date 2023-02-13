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
    
    public function cards ()
    {
        return $this->hasMany(Card::class);
    }
    
    public function stamp ()
    {
        return $this->belongsTo(Stamp::class);
    }
}
