<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Override;

class Gallery extends Model
{
    protected $fillable = [
        'gallery_title',
        'gallery_description',
        'gallery_image',
        'slug',
        'user_id',
        'status',
    ];

    #[Override]
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
