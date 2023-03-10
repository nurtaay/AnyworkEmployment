<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function resumes(){
        return $this->hasMany(Resume::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function tours(){
        return $this->hasMany(Tournoment::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function favouritePosts(){
        return $this->belongsToMany(Post::class,'favourite')
            ->withTimestamps();
    }
    public function Rposts(){
        return $this->belongsToMany(Post::class)->withPivot('message')->withTimestamps();
    }

    public function BoughtCart(){
        return $this->belongsToMany(Post::class, 'cart')
            ->withPivot('week', 'status')
            ->withTimestamps();
    }

    public function postswithStatus($status){
        return $this->belongsToMany(Post::class, 'cart')
            ->wherePivot('status', $status)
            ->withPivot('week', 'status')
            ->withTimestamps();
    }


    public function wallets(){
        return $this->hasMany(Wallet::class);
    }
}
