<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'text',
        'comment_parent'
    ];

    public function post(){
        return $this->belongsTo(\App\Models\Post::class);
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function parent(){ //padres
        return $this->belongsTo(\App\Models\Comment::class, 'comment_parent');
    }
     
    public function replies(){ //hijos
        return $this->hasMany(\App\Models\Comment::class, 'comment_parent');
    } 

}
