<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['slug','published_at'];

 	protected $fillable = array('title', 'description','image');  
  	
  	protected $dates = ['published_at'];
  
  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;
    if (!$this->exists) {
      $this->attributes['slug'] = str_slug($value);
    }
  }

}
