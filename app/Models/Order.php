<?php

namespace App\Models;

use App\Models\Traits\Relationship\OrderRelationship;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use OrderRelationship;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
}
