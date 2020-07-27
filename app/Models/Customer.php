<?php

namespace App\Models;

use App\Models\Traits\Relationship\CustomerRelationship;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use CustomerRelationship;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
}
