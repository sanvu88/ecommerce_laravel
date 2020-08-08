<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function store(Request $request)
    {

    }

    public function destroy(Request $request)
    {
        session()->forget('coupon');
    }
}