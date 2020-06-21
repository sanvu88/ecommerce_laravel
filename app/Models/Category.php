<?php

namespace App\Models;

use App\Models\Traits\Attribute\CategoryAttribue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use CategoryAttribue,
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
}
