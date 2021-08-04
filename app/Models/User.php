<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'admin_since'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'admin_since'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function setPasswordAttribute($password){

        $this->attributes['password'] = bcrypt($password);
    }

    public function isAdmin(){
        return $this->admin_since != null 
            && $this->admin_since->lessThanOrEqualTo(now());
    }

    public function getProfileImageAttribute(){
        return $this->image ? "images/{$this->image->path}" : 'https://www.gravatar.com/avatar/404?d=mp';
    }

    public function profile()
    {
        return $this->hasOne(\App\Models\Profile::class);
    }

    public function posts(){
        return $this->hasMany(\App\Models\Post::class);
    }

    public function comments(){
        return $this->hasMany(\App\Models\Comment::class);
    }
    
    public function likes(){
        return $this->hasMany(\App\Models\Like::class);
    }

}
