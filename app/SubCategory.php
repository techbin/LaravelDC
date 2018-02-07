<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $guarded = [];
    protected $fillable =['title','description','image'];

    public function setTitleAttribute($value){
    
    $this->attributes['title'] = $value;
    if (!$this->exists) {
      $this->attributes['slug'] = str_slug($value);
    }
    
    }
}
