<?php

namespace App\Models;

use App\Models\Traits\Attribute\CategoryAttribue;
use App\Models\Traits\Scope\CategoryScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use CategoryAttribue,
        CategoryScope,
        SoftDeletes;

    protected $fillable = ['name', 'slug', 'parent_id', 'description'];

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
}
