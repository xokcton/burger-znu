<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = empty($value) ? \Str::slug($this->attributes['name'], '-') : \Str::slug($value);
    }

    public function getImgAttribute($value)
    {
        return empty($value) ? '/images/no-photo.jpg' : $value;
    }
}
