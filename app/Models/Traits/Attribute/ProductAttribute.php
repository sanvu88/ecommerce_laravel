<?php


namespace App\Models\Traits\Attribute;


use Illuminate\Support\Facades\Storage;

trait ProductAttribute
{
    public function getCategoryNameAttribute()
    {
        return isset($this->category) ? $this->category->name : '';
    }

    public function getThumbnailAttribute()
    {
        return asset(Storage::url($this->thumbnail_path . '/' . $this->thumbnail_filename));
    }
}
