<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Override;

class Post extends Model
{
    protected $fillable = [
        'title',
        'job_type',
        'experince_level',
        'salary',
        'location',
        'vacancy',
        'category_id',
        'application_deadline',
        'feature_image',
        'responsibilities',
        'requirement',
        'gender',
        'slug',
        'description',
        'status',
        'published_at',
        'job_expired',
        
        'user_id',
    ];

    #[Override]
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
     public function user(){
        return $this->belongsTo(User::class);
    }

      public function category(){
        return $this->belongsTo(Category::class);
    }

     public function savejobs(){
        return $this->hasMany(Savejob::class);
    }
      
}
