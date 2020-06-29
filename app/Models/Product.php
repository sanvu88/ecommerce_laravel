<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'category_id', 'description', 'status', 'price'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
