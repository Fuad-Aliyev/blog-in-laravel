<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    //
    use Sluggable;

    protected $fillable = ['user_id', 'category_id', 'title', 'content', 'photo_id'];

    public function user() {

    	return $this->belongsTo('App\User');
    }

    public function photo() {

    	return $this->belongsTo('App\Photo');
    }

    public function category() {

    	return $this->belongsTo('App\Category');
    }

    public function comments() {

        return $this->hasMany('App\Comment');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

}
