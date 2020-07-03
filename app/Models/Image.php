<?php

namespace App;

use App\Models\Traits\Relationship\ImageRelationship;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use ImageRelationship;

    protected $guarded = ['id'];
}
