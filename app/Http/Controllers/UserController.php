<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;
use App\Models\Users;

use Illuminate\Support\Facades\Hash;

session_start();

use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('id_users');
        if ($admin_id != null) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function show_user()
    {
        $this->AuthLogin();

        $data['id_users'] = Session::get('id_users');
        $history_order = DB::table('order')->where('id_users', $data['id_users'])->get();
        $all_user = DB::table('users')->where('id_users', $data['id_users'])->get();
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        return view('pages.user.show_user')->with('category', $cate_product)->with('brand', $brand_product)->with('all_user', $all_user)->with('history_order', $history_order);
    }
    public function update_user(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $users = Users::find(Session::get('id_users'));

        $users->phone = $request->phone;
        $users->fullname = $request->name;
        $users->address = $request->address;
        $users->save();
        return Redirect::to('/show-user');
    }
    public function changPassword(Request $Request)
    {
        $this->AuthLogin();
        $this->validate(
            $Request,
            [
                'password_old' => 'required',
                'password' => 'required|min:6',
                'password_comfirm' => 'required|same:password'

            ],
            [
                'password_old.required' => 'Vui lòng nhập mật khẩu cũ',

                'password.required' => 'Vui lòng nhập mật khẩu mới',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự',
                'password_comfirm.required' => 'Nhập lại mật khẩu không giống',
                'password_comfirm.same' => 'Mật khẩu không giống nhau',
            ]
        );
        $data = $Request->all();
        // $password_old = $Request->password_old;
        // $users = new Users;
        $users = Users::find(Session::get('id_users'));
        // $pass = md5($Request->password_old);
        // dd($pass);
        // dd(Hash::check(md5($Request->password_old), '==', $users->password));
        if (!Hash::check(md5($Request->password_old), $users->password)) {

            $users->password = md5($Request->password);
            $users->save();
            return redirect()->back()->with('message', 'Thay đổi mật khẩu thành công');
        } else {
            return redirect()->back()->with('message', 'Thay đổi mật khẩu thất bại');
        }
    }
}
