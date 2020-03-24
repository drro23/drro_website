<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable 
     * (some kind of white list of attributes the user can fill)
     *
     * @var array
     */
    protected $fillable = ["content", "category_id"];


    /**
     * A post belongs to a category
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }
}