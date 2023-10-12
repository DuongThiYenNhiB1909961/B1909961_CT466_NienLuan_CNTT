<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeship;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;

class OrderController extends Controller
{
    public function manage_order(){
        $all_order = Order::orderby('created_at','DESC')->get();
        return view('admin.manage_order')->with('all_order',$all_order);
    }
    public function view_order($order_code){
        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
		$order = Order::where('order_code',$order_code)->get();
		foreach($order as $key => $or){
			$customer_id = $or->customer_id;
			$shipping_id = $or->shipping_id;
			$order_status = $or->order_status;
		}
		$customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

		foreach($order_details as $key => $details){

			$coupon_code = $details->coupon;
		}
		if($coupon_code != 'no'){
			$coupon = Coupon::where('coupon_code',$coupon_code)->first();
			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;
		}else{
			$coupon_condition = 2;
			$coupon_number = 0;
		}
		
		return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','order','order_status'));

        }
}
