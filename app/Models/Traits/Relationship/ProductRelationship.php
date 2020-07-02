<?php

namespace App\Models\Traits\Relationship;

trait ProductRelationship
{
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
