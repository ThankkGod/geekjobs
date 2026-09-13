<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Override;

class Work extends Model
{
    protected $fillable = [
        'work_name',
        'company_name',
        'start_date',
        'end_date',
        'work_description',
        'slug',
        'user_id',
    ];

    #[Override]
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
