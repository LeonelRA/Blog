<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Events\CreatePost;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'published_at',
        'category_id',
        'status_id'
    ];

    protected $dates = [
        'published_at'
    ];

    protected $with = [
        'image',
        'category',
        'tags',
        'likes',
        'comments'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublic($query){
        return $query->where('status_id', 1);
    }

    public function setSlugAttribute($slug){
        $this->attributes['slug'] = Str::slug($slug, '_');
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function category(){
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function status(){
        return $this->belongsTo(\App\Models\Status::class);
    }

    public function tags(){
        return $this->belongsToMany(\App\Models\Tag::class);
    }

    public function image(){
        return $this->morphOne(\App\Models\Image::class, 'imageable');
    }

    public function comments(){
        return $this->hasMany(\App\Models\Comment::class)->whereNull('comment_parent');
    }

    public function likes(){
        return $this->morphMany(\App\Models\Like::class, 'likeable');
    }

    public function getMyLikeAttribute(){
        return $this->likes()->whereUserId(\Auth::id())->first() ?? false;
    }

}
