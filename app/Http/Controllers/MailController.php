<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;

session_start();

use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function send_mail(Request $request)
    {
        $to_name = "Phan Ha";
        $to_email = $request->email;
        // gui mail
        $data = array("name" => "mail gui tu tai khoan ngan hang", "body" => "nhan dang ky khuyen mai");
        Mail::send('pages.email.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('test gui gmail google');
            $message->from($to_name, $to_email);
        });
        return view('trang-chu')->with('messafe', '');
    }
}
