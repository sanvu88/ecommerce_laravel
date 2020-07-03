<?php

namespace App\Models;

use App\Models\Traits\Attribute\ProductAttribute;
use App\Models\Traits\Relationship\ProductRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use ProductRelationship,
        ProductAttribute,
        SoftDeletes;

    protected $guarded = ['id'];
}
