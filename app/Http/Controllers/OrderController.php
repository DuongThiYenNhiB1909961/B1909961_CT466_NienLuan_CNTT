<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeship;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;

class OrderController extends Controller
{
	public function update_inventory_qty(Request $request){
		$data = $request->all();
		$order = Order::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();

		if($order->order_status==2){
			foreach($data['order_product_id'] as $key1 => $product_id){
				
				$product = Product::find($product_id);
				$product_quantity = $product->product_qty;
				$product_sold = $product->product_sold;
				foreach($data['quantity'] as $key2 => $qty){
						if($key1 == $key2){
								$pro_remain = $product_quantity - $qty;
								$product->product_qty = $pro_remain;
								$product->product_sold = $product_sold + $qty;
								$product->save();
						}
				}
			}
		}elseif($order->order_status!=2 && $order->order_status!=3){
			foreach($data['order_product_id'] as $key => $product_id){
				
				$product = Product::find($product_id);
				$product_quantity = $product->product_qty;
				$product_sold = $product->product_sold;
				foreach($data['quantity'] as $key2 => $qty){
						if($key==$key2){
								$pro_remain = $product_quantity + $qty;
								$product->product_qty = $pro_remain;
								$product->product_sold = $product_sold - $qty;
								$product->save();
						}
				}
			}
		}
	}
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
