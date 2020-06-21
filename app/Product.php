<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    public function images()
    {
        return $this->morphToMany('App\Image', 'imageable');
    }
}
