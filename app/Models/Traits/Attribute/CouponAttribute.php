<?php

namespace App\Models\Traits\Attribute;

trait CouponAttribute
{
    public function getStatusLabelAttribute()
    {
        if ($this->status == config('common.coupon.status.active')) {
            return '<span class="badge badge-success">Active</span>';
        } else {
            return '<span class="badge badge-secondary">Inactive</span>';
        }
    }

    public function getValueLabelAttribute()
    {
        if ($this->type == config('common.coupon.type.percent')) {
            return $this->value . ' %';
        } else {
            return $this->value . ' VNĐ';
        }
    }
}
