<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders_count = Order::count();
        $clients_count = Client::count();
        $categories_count = Category::count();
        $products_count = Product::count();

        $sales_data = Order::select(
            DB::raw('year(created_at)  as year'),
            DB::raw('month(created_at) as month'),
            DB::raw('SUM(total_price) as sum')
        )->groupBy('month')->get();

        return view('app.index',compact('orders_count','clients_count','categories_count','products_count','sales_data'));
    }

    public function test()
    {
        return view('app.authentification.login2');

    }
}
