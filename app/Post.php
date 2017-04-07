<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $title;
    protected $body;
    protected $author;
    public function categories()
    {
        return $this->belongsToMany('App\Post');
    }
}
