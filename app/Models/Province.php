<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'cities';

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
}
