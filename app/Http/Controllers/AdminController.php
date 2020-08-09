<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->firstOfMonth();

        // Order statistic
        $orders = Order::all();
        $orderTotal = $orders->count();
        $orderIncrease = $orders->where('created_at', '>=', $date);
        $orderIncrease = round($orderIncrease->count() / $orderTotal, 2) * 100;

        // Product statistic
        $products = Product::all();
        $productTotal = $products->count();
        $productIncrease = $products->where('created_at', '>=', $date);
        $productIncrease = round($productIncrease->count() / $productTotal, 2) * 100;

        // Customer statictis
        $customers = Customer::all();
        $customerTotal = $customers->count();
        $customerIncrease = $customers->where('created_at', '>=', $date);
        $customerIncrease = round($customerIncrease->count() / $customerTotal, 2) * 100;

        return view('backend.dashboard.index')
            ->with([
                'orderTotal' => $orderTotal,
                'orderIncrease' => $orderIncrease,
                'productTotal' => $productTotal,
                'productIncrease' => $productIncrease,
                'customerTotal' => $customerTotal,
                'customerIncrease' => $customerIncrease,
            ]);
    }
}
