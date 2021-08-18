<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Cart;
use Illuminate\Pagination\LengthAwarePaginator;

session_start();

use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Null_;


class OrderController extends Controller
{
    // thay đổi tình trạng đơn hàng
    public function update_order_qty(Request $Request)
    {
        $data = $Request->all();
        $order = Order::find($data['id_order']);
        $order->order_status = $data['order_status'];
        $order->save();
    }
    // khách hàng Hủy Đơn hàng 
    public function huy_don_hang(Request $Request)
    {
        $data = $Request->all();
        $orderh = Order::where('order_code', $data['order_code'])->first();
        $orderh->order_destroy = $data['lydo'];
        $orderh->order_status = 5;
        $orderh->save();
    }
}
