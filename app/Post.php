<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['category_id', 'photo_id', 'title', 'body'];

    //Las siguientes relaciones son belongsTo pq se asumen q cada post tiene un usuario, una fotom y una categoria

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function photo(){

        return $this->belongsTo('App\Photo');

    }

    public function category(){

        return $this->belongsTo('App\Category');

    }
}

