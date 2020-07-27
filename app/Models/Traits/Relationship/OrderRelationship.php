<?php

namespace App\Models\Traits\Relationship;

trait OrderRelationship
{
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function order_details()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
