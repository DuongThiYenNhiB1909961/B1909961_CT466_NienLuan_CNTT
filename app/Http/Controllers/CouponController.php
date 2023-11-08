<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
{
    //cart
    public function check_coupon(Request $request){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $data = $request->all();
        if(Session::get('customer_id')){
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$now)
            ->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
            if($coupon){
                return redirect()->back()->with('error','Mã đã sử dụng vui lòng nhập mã khác');
            }else{
                $coupon_login = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$now)->first();
                if($coupon_login){
                    $count = $coupon_login->count();
                    if($count>0){
                        $session = Session::get('coupon');
                        if($session==true){
                            $is_avaiable = 0;
                            if($is_avaiable==0){
                                $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,
    
                                );
                                Session::put('coupon',$cou);
                            }
                        }else{
                            $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,
    
                                );
                            Session::put('coupon',$cou);
                        }
                        Session::save();
                        return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                    }
    
                }else{
                    return redirect()->back()->with('error','Mã giảm giá không đúng hoặc đã hết hạn');
                }
            }
        }else{
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$now)->first();
            if($coupon){
                $count = $coupon->count();
                if($count>0){
                    $session = Session::get('coupon');
                    if($session==true){
                        $is_avaiable = 0;
                        if($is_avaiable==0){
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,

                            );
                            Session::put('coupon',$cou);
                        }
                    }else{
                        $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,

                            );
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                }

            }else{
                return redirect()->back()->with('error','Mã giảm giá không đúng hoặc đã hết hạn');
            }
        }
        
    }
    public function add_coupon(){
        return view('admin.coupon.add_coupon');
    }
    public function add_coupon_code(Request $request){
        $data = $request->all();
        $coupon = new Coupon();

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
        $coupon->save();

        Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('add-coupon');
    }
    public function all_coupon(){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $coupon = Coupon::orderby('coupon_id','DESC')->get();
    	return view('admin.coupon.all_coupon')->with(compact('coupon', 'now'));
    }
    public function delete_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('all-coupon');
    }
    public function del_coupon(){
        $coupon = Session::get('coupon');
    	if($coupon==true){
            Session::forget('coupon'); 
            return redirect()->back()->with('message','Đã xóa mã giảm');
        }else{
            return redirect()->back()->with('message','Vui lòng kiểm tra lại');
        }
    }
}
