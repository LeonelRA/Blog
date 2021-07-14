<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function scopeId($query, $status){
        $status = $query->whereName($status)->first();

        return $status->id;
    }

    public function posts(){
        return $this->hasMany(\App\Models\Post::class);
    }

}
