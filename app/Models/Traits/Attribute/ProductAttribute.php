<?php


namespace App\Models\Traits\Attribute;


use Illuminate\Support\Facades\Storage;

trait ProductAttribute
{
    public function getStatusNameAttribute()
    {
        return config('common.product.status')[$this->status];
    }
}
