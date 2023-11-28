<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\tenmodel;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function quen_mk(Request $request){
        $meta_desc = "Quên mật khẩu";
        $meta_keywords = "Quên mật khẩu";
        $meta_title = "Quên mật khẩu";
        $url_canonical = $request->url(); 

        return view('pages.forget_pass')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function get_pass(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_email = "Lấy lại mật khẩu Thienduonglamdep.com".' '.$now;
        $customer = Customer::where('customer_email','=',$data['email_account'])->get();
        foreach($customer as $key =>$value){
            $customer_id = $value->customer_id;
        }

        if($customer){
            $count_customer = $customer->count();
            if($count_customer==0){
                return redirect()->back()->with('error','Email chưa được đăng ký để khôi phục mật khẩu');
            }else{
                $token_random = Str::random();
                $customer = Customer::find($customer_id);
                $customer->customer_token = $token_random;
                $customer->save();

                $to_email = $data['email_account'];
                $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);

                $data = array("name"=>$title_email,"body"=>$link_reset_pass,'email'=>$data['email_account']);
                
                Mail::send('pages.send_email_pass',['data'=>$data ], function($message) use ($title_email,$data){
                    $message->to($data['email'])->subject($title_email);
                    $message->from($data['email'],$title_email);
                });
                return redirect()->back()->with('message','Gửi mail thành công, vui lòng vào email để reset password');
            }
        }

        
    }
    public function reset_new_pass(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
        $count = $customer->count();
        if($count>0){
            foreach($customer as $key => $cus){
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = $data['password_account'];
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect('login-checkout')->with('message','Mật khẩu đã cập nhật mới. Quay lại trang đăng nhập');
        }else{
            return redirect('forget-pass')->with('error','Vui lòng nhập lại email vì link đã quá hạn'); 
        }
    }
    public function update_new_pass(Request $request){
        $meta_desc = "Mật khẩu mới";
        $meta_keywords = "Mật khẩu mới";
        $meta_title = "Mật khẩu mới";
        $url_canonical = $request->url(); 

        return view('pages.new_pass')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);

    }
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
