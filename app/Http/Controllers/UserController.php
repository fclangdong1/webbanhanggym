<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;

session_start();

use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function show_user()
    {
        $data['id_users'] = Session::get('id_users');
        $all_user = DB::table('users')->where('id_users', $data['id_users'])->get();
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        return view('pages.user.show_user')->with('category', $cate_product)->with('brand', $brand_product)->with('all_user', $all_user);
    }
    public function update_user(Request $request)
    {
        // $data['id_users'] = Session::get('id_users');
        // $all_user = DB::table('users')->where('id_users', $data['id_users'])->get();
        // $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        // $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        $data = array();
        $data['id_users'] = Session::get('id_users');
        $all_user = DB::table('users')->where('id_users', $data['id_users'])->get();
        $data['fullname'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        DB::table('users')->where('id_users',  $all_user)->save($data);
        Session::put('message', 'Cập Nhật Thành Công');
        return Redirect::to('/show-user');
        // return view('pages.user.show_user')->with('category', $cate_product)->with('brand', $brand_product);
    }
}
