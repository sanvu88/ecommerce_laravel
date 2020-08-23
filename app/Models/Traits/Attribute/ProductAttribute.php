<?php


namespace App\Models\Traits\Attribute;


use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait ProductAttribute
{
    public function getStatusNameAttribute()
    {
        return config('common.product.status')[$this->status];
    }

    public function getCurrentPromotionAttribute()
    {
        if ($this->promotions->count()) {
            return $this->promotions()->where('date_start', '<=', Carbon::now())->first();
        }
        return null;
    }
}
