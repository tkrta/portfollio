<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    
    public function cards ()
    {
        return $this->hasMany(Card::class);
    }
    
    public function stamps ()
    {
        return $this->hasMany(Stamp::class);
    }
}
