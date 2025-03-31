<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::where('payment_status', 'done')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->sum('order_details.price');
        $newOrders = Order::where('status', 'pending')->count();

        $bestSellingProduct = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->selectRaw('product_id, SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->first();

        $monthlyRevenue = Order::where('payment_status', 'done')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->whereYear('orders.created_at', Carbon::now()->year)
            ->selectRaw('MONTH(orders.created_at) as month, SUM(order_details.price) as revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $revenues = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = 'Tháng ' . $i;
            $revenues[] = $monthlyRevenue->firstWhere('month', $i)->revenue ?? 0;
        }
        return view('admin.dashboard', compact('totalRevenue', 'newOrders', 'bestSellingProduct', 'months', 'revenues'));
    }
}
