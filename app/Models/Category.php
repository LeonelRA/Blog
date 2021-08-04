<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
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

    public function scopeId($query, $category){
        $category = $query->whereName($category)->first();
        
        return $category->id;
    }

    public function posts(){
        return $this->hasMany(\App\Models\Post::class);
    }
}
