<?php

namespace App\Models\Traits\Relationship;

trait ProductRelationship
{
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category');
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public function images()
    {
        return $this->morphToMany('App\Models\Image', 'imageable');
    }
}
