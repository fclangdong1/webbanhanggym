<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Products;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Illuminate\Support\Facades\Hash;
use Cart;
use Illuminate\Pagination\LengthAwarePaginator;


use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Null_;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            // tỉnh tổng toàn bộ sản phẩm tồn
            $total_product = DB::table('products')->sum('product_quantity');

            $order1 = Order::where('order_status', 1)->count();
            $order2 = Order::where('order_status', 2)->count();
            $order3 = Order::where('order_status', 3)->count();
            $order4 = Order::where('order_status', 4)->count();
            $order5 = Order::where('order_status', 5)->count();

            $view->with(compact('order1', 'order2', 'order3', 'order4', 'order5', 'total_product'));
        });
    }
}
