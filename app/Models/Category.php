<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Override;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'user_id',
    ];

    #[Override]
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
