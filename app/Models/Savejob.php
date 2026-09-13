<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Override;

class Savejob extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    // #[Override]
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
     public function post(){
        return $this->belongsTo(Post::class);
    }
}
