<?php

namespace App\Http\Controllers;
use Mail;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\tenmodel;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send_coupon(){
        $customer_vip = Customer::where('customer_vip', 1)->get();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_email = "Mã khuyến mãi ngày".' '.$now;

        $data = [];
        foreach($customer_vip as $vip){
            $data['email'][] = $vip->customer_email;
        }
        // dd($data);
        Mail::send('pages.send_email',$data , function($message) use ($title_email,$data){
            $message->to($data['email'])->subject($title_email);
            $message->from($data['email'],$title_email);
        });
        return redirect()->back()->with('message','Gửi mã khuyến mãi khách vip thành công');
    }
    public function mail_example(){
        return view('pages.send_email');
    }
}
