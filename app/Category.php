<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = "categories";

        /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Setting default attributes of the model
     * 
     * @var array
     */
    protected $attributes = ["isActive" => true];

    /**
     * The attributes that are mass assignable 
     * (some kind of white list of attributes the user can fill)
     *
     * @var array
     */
    protected $fillable = ["isActive", "label", "isProjectCategory"];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}