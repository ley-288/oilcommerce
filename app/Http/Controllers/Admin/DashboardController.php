<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        $totalAllUsers = User::count();
        $totalUser = User::where('role_as','0')->count();
        $totalAdmin = User::where('role_as','1')->count();

        $todaysDate = Carbon::now()->format('d-m-y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalOrder = Order::count();
        $todaysOrder = Order::whereDate('created_at', $todaysDate)->count();
        $thisMonthsOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearsOrder = Order::whereYear('created_at', $thisYear)->count();

        return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalBrands', 'totalAllUsers', 'totalUser', 'totalAdmin', 'totalOrder', 'todaysOrder', 'thisMonthsOrder', 'thisYearsOrder'));
    }
}
