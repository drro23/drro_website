<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable 
     * (some kind of white list of attributes the user can fill)
     *
     * @var array
     */
    protected $fillable = ["title", "description", "date", "image", "website_url", "github_url", "video_url", "used_techs", "category_id"];
    protected $hidden = ['category_id'];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A project belongs to a category
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}