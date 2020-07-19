<?php


namespace App\Models\Traits\Relationship;


trait CategoryRelationship
{
    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function subProducts()
    {
        return $this->hasManyThrough('App\Models\Product', 'App\Models\Category', 'parent_id', 'category_id', 'id');
    }
}
