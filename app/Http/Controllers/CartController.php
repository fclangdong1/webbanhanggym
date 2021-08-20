<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Coupon;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;
use Illuminate\Pagination\LengthAwarePaginator;
use Cart;

session_start();

use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    // gio hang
    public function gio_hang(Request $request)
    {

        $cart = Session::get('cart');
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        return view('pages.cart.cart_ajax')->with('category', $cate_product)->with('brand', $brand_product)->with('cart', $cart);
    }
    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['id_products'] == $data['cart_product_id']) {
                    $is_avaiable++;
                    $cart[$key] = array(
                        'session_id' => $session_id,
                        'product_name' => $data['cart_product_name'],
                        'id_products' => $data['cart_product_id'],
                        'product_image' => $data['cart_product_image'],
                        'product_quantity' => $data['cart_product_quantity'],
                        'product_qty' => $data['cart_product_qty'],
                        'product_price' => $data['cart_product_price'],
                    );
                    Session::put('cart', $cart);
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'id_products' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_quantity' => $data['cart_product_quantity'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'id_products' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            // Session::put('cart', $cart);
        }
        Session::put('cart', $cart);

        Session::save();
    }
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hiden;
        $quantity = $request->qty;
        $product_info = DB::table('products')->where('id_products', $productId)->first();
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $product_info->id_products;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
    }

    //show cart
    public function show_cart()
    {
        $cart = Session::get('cart');
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product)->with('cart', $cart);
    }
    // xóa sản phẩm
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    // xóa sản phẩm
    public function del_product($session_id)
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    // update sản phâm giỏ hàng
    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            $message = '';

            foreach ($data['cart_qty'] as $key => $qty) {
                $i = 0;
                foreach ($cart as $session => $val) {
                    $i++;

                    if ($val['session_id'] == $key && $qty <= $cart[$session]['product_quantity']) {

                        $cart[$session]['product_qty'] = $qty;
                        // $message .= '<p style="color:blue">' . $i . ') Cập nhật số lượng :' . $cart[$session]['product_name'] . ' thành công</p>';
                    } elseif ($val['session_id'] == $key && $qty >= $cart[$session]['product_quantity']) {
                        // $message .= '<p style="color:red">' . $i . ') Cập nhật số lượng :' . $cart[$session]['product_name'] . ' thất bại</p>';
                    }
                }
            }

            Session::put('cart', $cart);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    // tinh phi khuyen mai 
    public function check_coupon(Request $request)
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString('Y/m/d');
        $data = $request->all();
        if (Session::get('id_users')) {
            $coupon = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $today)->where('coupon_used', 'LIKE', '%' . Session::get('id_users') . '%')->first();
            if ($coupon) {
                return redirect()->back()->with('error', 'Mã giảm giá đã sử dụng,vui lòng nhập mã khác');
            } else {

                $coupon_login = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $today)->first();
                if ($coupon_login) {
                    $count_coupon = $coupon_login->count();
                    if ($count_coupon > 0) {
                        $coupon_session = Session::get('coupon_code');
                        if ($coupon_session == true) {
                            $is_avaiable = 0;
                            if ($is_avaiable == 0) {
                                $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,

                                );
                                Session::put('coupon_code', $cou);
                            }
                        } else {
                            $cou[] = array(
                                'coupon_code' => $coupon_login->coupon_code,
                                'coupon_condition' => $coupon_login->coupon_condition,
                                'coupon_number' => $coupon_login->coupon_number,

                            );
                            Session::put('coupon_code', $cou);
                        }
                        Session::save();
                        return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
                    }
                } else {
                    return redirect()->back()->with('error', 'Mã giảm giá không đúng - hoặc đã hết hạn');
                }
            }
            //neu chua dang nhap
        } else {
            $coupon = Coupon::where('coupon_code', $data['coupon_code'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $today)->first();
            if ($coupon) {
                $count_coupon = $coupon->count();
                if ($count_coupon > 0) {
                    $coupon_session = Session::get('coupon_code');
                    if ($coupon_session == true) {
                        $is_avaiable = 0;
                        if ($is_avaiable == 0) {
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,

                            );
                            Session::put('coupon_code', $cou);
                        }
                    } else {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon_code', $cou);
                    }
                    Session::save();
                    return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
                }
            } else {
                return redirect()->back()->with('error', 'Mã giảm giá không đúng - hoặc đã hết hạn');
            }
        }
    }
    // xóa mã giảm giá khách hàng
    public function unset_coupon()
    {
        $coupon_code = Session::get('coupon_code');

        if ($coupon_code == true) {
            Session::forget('coupon_code');
            return redirect()->back()->with('mesage', 'Xóa mã thành công');
        }
    }
}
