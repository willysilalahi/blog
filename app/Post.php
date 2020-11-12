<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'category_id', 'content', 'slug', 'image'];
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tag(){
        return $this->belongsToMany('App\Tag');
    }
}
