<?php

namespace App\Models;

use App\Models\Education;
use App\Models\Gallery;
use App\Models\Personal;
use App\Models\Post;
use App\Models\Savejob;
use App\Models\Work;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name', 
    'email', 
    'password',
    'phone',
    'address',
    'status',
    'profile_pic',
    'resume',
    'role',
    ])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function personal(){
        return $this->hasOne(Personal::class);
    }
    public function educations(){
        return $this->hasMany(Education::class);
    }

     public function works(){
        return $this->hasMany(Work::class);
    }

     public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function savejobs(){
        return $this->hasMany(Savejob::class);
    }

      public function galleries(){
        return $this->hasMany(Gallery::class);
    }

}
