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

class HomeController extends Controller
{
    public function index()
    {
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();

        //products
        $all_product = DB::table('products')->where('product_status', '0')->orderby('id_products', 'desc')->get();
        $all_product_device = DB::table('products')->where('product_status', '0')->where('id_type', '14')->orderby('id_products', 'desc')->get();
        $all_product_boy = DB::table('products')->where('product_status', '0')->where('id_type', '17')->orderby('id_products', 'desc')->get();
        $all_product_girl = DB::table('products')->where('product_status', '0')->where('id_type', '16')->orderby('id_products', 'desc')->get();
        $all_product_wife = DB::table('products')->where('product_status', '0')->where('id_type', '15')->orderby('id_products', 'desc')->get();
        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('all_product_device', $all_product_device)->with('all_product_boy', $all_product_boy)->with('all_product_girl', $all_product_girl)->with('all_product_wife', $all_product_wife);
    }
    // tìm kiếm trang chủ
    public function search(request $request)
    {
        $keywords = $request->keywords_sumbmit;
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        $search_product = DB::table('products')->where('product_name', 'like', '%' . $keywords . '%')->get();
        return view('pages.sanpham.search')->with('category', $cate_product)->with('brand', $brand_product)->with('search_product', $search_product);
    }

    // tìm kiếm products admin
    public function search_product(request $request)
    {
        $keywords = $request->keywords_sumbmit;
        // $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        // $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        // $search_product = DB::table('products')->where('product_name', 'like', '%' . $keywords . '%')->get();
        $all_product = DB::table('products')
            ->join('type_products', 'type_products.id_type', '=', 'products.id_type')
            ->join('brand', 'brand.id_brand', '=', 'products.id_brand')
            ->orderby('products.id_products', 'desc')->where('product_name', 'like', '%' . $keywords . '%')->simplePaginate(5);
        return view('pages.admin.search.search_product')->with('all_product', $all_product);
    }

    public function search_brand(request $request)
    {
        $keywords = $request->keywords_sumbmit;
        // $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        // $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        $all_brand_product = DB::table('brand')->where('brand_name', 'like', '%' . $keywords . '%')->get();

        return view('pages.admin.search.search_brand')->with('all_brand_product', $all_brand_product);
    }
}
