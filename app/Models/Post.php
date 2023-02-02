<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
        protected $fillable = [
                
                'user_id',
                'title',
                'body',
                
            ];
    
    public function getPaginateByLimit (int $limit_count = 10)
    {
        return $this-> orderBy('updated_at', 'DESC')-> paginate($limit_count);
    }
    
    public function users ()
    {
        return $this-> belongsToMany(User::class, 'likes', 'post_id', 'user_id');
        
    }
    
    public function islikes ()
    {
        foreach(auth()->user()->liked_posts as $post)
        {
            if($post->id == $this->id){
                return true;
            }
            return false;
        }
    }
    
    public function replies ()
        {
            return $this-> hasMany(Reply::class);
        }
        
}

