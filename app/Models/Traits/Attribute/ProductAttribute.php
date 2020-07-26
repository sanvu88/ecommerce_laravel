<?php


namespace App\Models\Traits\Attribute;


use Illuminate\Support\Facades\Storage;

trait ProductAttribute
{
    public function getThumbnailAttribute()
    {
        return asset(Storage::url($this->thumbnail_path . '/' . $this->thumbnail_filename));
    }

    public function getStatusNameAttribute()
    {
        return config('common.product.status')[$this->status];
    }
}
