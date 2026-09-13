<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = [
        'profession_name',
        'nationality',
        'state',
        'language',
        'career_objective',
        'user_id',
        'slug',
        'status',
    ];

    function user() {
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
{
    return 'slug';
}
}
