<?php

namespace App\Models;

use App\Models\Traits\Attribute\ProductAttribute;
use App\Models\Traits\Relationship\ProductRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use ProductRelationship,
        ProductAttribute,
        SoftDeletes,
        Searchable;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $asYouType = true;

    public function searchableAs()
    {
        return 'products_index';
    }
}
