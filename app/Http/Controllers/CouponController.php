<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;
use Carbon\Carbon;
use Cart;

use Illuminate\Support\Facades\Redirect;

session_start();
class CouponController extends Controller
{
    public function insert_coupon()
    {
        return view('pages.admin.coupon.insert_coupon');
    }
    public function list_coupon()
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString('Y/m/d');
        $coupon = Coupon::orderby('id_coupon', 'DESC')->paginate(5);
        return view('pages.admin.coupon.list_coupon')->with(compact('coupon', 'today'));
    }
    public function insert_coupon_code(Request $request)
    {
        $data = $request->all();
        $coupon = new Coupon;

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();
        Session::put('message', 'Thêm mã giảm giá thành công');
        return Redirect::to('insert-coupon');
    }
    // xóa mã giảm giá trong admin
    public function delete_coupon($id_coupon)
    {
        $coupon = Coupon::find($id_coupon);
        $coupon->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }
}
