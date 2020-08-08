<?php

namespace App\Models;

use App\Models\Traits\Method\CouponMethod;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use CouponMethod;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
}
