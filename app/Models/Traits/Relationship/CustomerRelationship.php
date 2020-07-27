<?php

namespace App\Models\Traits\Relationship;

trait CustomerRelationship
{
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
