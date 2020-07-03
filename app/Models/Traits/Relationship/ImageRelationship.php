<?php


namespace App\Models\Traits\Relationship;


trait ImageRelationship
{
    public function product()
    {
        return $this->morphedByMany('App\Models\Product', 'imageable');
    }
}
