<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
            'post_id',
            'user_id',
            'title',
            'body',
        ];
    
    public function getPaginateByLimit (int $limit_count = 10)
        {
            return $this-> orderBy('updated_at', 'DESC')-> paginate($limit_count);
        }
        
    public function replied_post ()
        {
            return $this-> belongsTo(Post::class);
        }
        
}
