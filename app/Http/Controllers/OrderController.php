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
		foreach($order as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

		// $order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

		foreach($order_details as $key => $order_d){

			$product_coupon = $order_d->coupon;
		}
		if($product_coupon != 'no'){
			$coupon = Coupon::where('coupon_code',$product_coupon)->first();
			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;
		}else{
			$coupon_condition = 2;
			$coupon_number = 0;
		}
		
		return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','order','order_status'));

        // $order_details = OrderDetails::where('order_code',$order_code)->get();
        // $order_by_code = Order::where('order_code',$order_code)->get();
        // foreach($order_by_code as $key => $order){
        //     $customer_id = $order->customer_id;
        //     $shipping_id = $order->shipping_id;
        // }
        // $customer = Customer::where('customer_id',$customer_id)->first();
        // $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        
        // $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();

        // foreach($order_details as $key => $order_d){

		// 	$product_coupon = $order_d->coupon;
		// }
        // if($product_coupon != 'no'){
		// 	$coupon = Coupon::where('coupon_code',$product_coupon)->first();
		// 	$coupon_condition = $coupon->coupon_condition;
		// 	$coupon_number = $coupon->coupon_number;
		// }else{
		// 	$coupon_condition = 2;
		// 	$coupon_number = 0;
		// }

        // return view('admin.view_order')->with('order_details',$order_details)->with('order_by_code',$order_by_code)->with('customer',$customer)->with('shipping',$shipping)->with('order_details',$order_details)->with('coupon_condition',$coupon_condition)->with('coupon_number',$coupon_number);
    }
}
