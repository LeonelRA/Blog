<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setSlugAttribute($slug){
        $this->attributes['slug'] = Str::slug($slug, '_');
    }

    public function posts(){
        return $this->belongsToMany(\App\Models\Post::class);
    }
}
