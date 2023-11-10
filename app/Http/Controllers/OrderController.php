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
use App\Models\Statistical;
use Carbon\Carbon;
use Session;
class OrderController extends Controller
{
	public function update_inventory_qty(Request $request){
		$data = $request->all();
		$order = Order::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();

		$order_date = $order->order_date;
		$statistical = Statistical::where('order_date', $order_date)->get();
		if($statistical){
			$statistical_count = $statistical->count();
		}else{
			$statistical_count = 0;
		}


		if($order->order_status==2){
			$total_order = 0;
			$sales = 0;
			$profit = 0;
			$quantity = 0;

			foreach($data['order_product_id'] as $key1 => $product_id){
				
				$product = Product::find($product_id);
				$product_quantity = $product->product_qty;
				$product_sold = $product->product_sold;

				$product_price = $product->product_price;
				$product_price_buy = $product->product_price_buy;
				$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

				foreach($data['quantity'] as $key2 => $qty){
						if($key1 == $key2){
								$pro_remain = $product_quantity - $qty;
								$product->product_qty = $pro_remain;
								$product->product_sold = $product_sold + $qty;
								$product->save();

								$quantity += $qty;
								$total_order += 1;
								$sales += $product_price*$qty;
								$profit += ($product_price*$qty) - ($product_price_buy*$qty);
						}
				}
			}
			if($statistical_count>0){
				$statistical_update = Statistical::where('order_date',$order_date)->first();
				$statistical_update->sales = $statistical_update->sales + $sales;
				$statistical_update->profit = $statistical_update->profit + $profit;
				$statistical_update->quantity = $statistical_update->quantity + $quantity;
				$statistical_update->total_order = $statistical_update->total_order + 1;
				$statistical_update->save();
			}else{
				$statistical_new = new Statistical();
				$statistical_new->order_date = $order_date;
				$statistical_new->sales = $sales;
				$statistical_new->profit = $profit;
				$statistical_new->quantity = $quantity;
				$statistical_new->total_order = $total_order;
				$statistical_new->save();
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
		$cus = Customer::where('customer_id', $customer_id)->first();
		// $customer = Customer::where('customer_id',$customer_id)->first();
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
		
		return view('admin.view_order')->with(compact('order_details','cus','shipping','order_details',
		'coupon_condition','coupon_number','order','order_status'));

        }
		public function delete_order($order_id){
			$order = Order::find($order_id)->delete();
			Session::put('message','Xóa đơn hàng thành công');
			return Redirect()->Back();
		}
		public function history(Request $request){
			
			if(!Session::get('customer_id')){
				return redirect('login-checkout')->with('error','Vui lòng đăng nhập để xem lịch sử đơn hàng');
			}else{
				$meta_desc = "Lịch sử đơn hàng";
				$meta_keywords = "Lịch sử đơn hàng";
				$meta_title = "Lịch sử đơn hàng";
				$url_canonical = $request->url(); 

				$getorder = Order::where('customer_id',Session::get('customer_id'))->orderby('order_date','DESC')->get();
				return view('pages.Cart.history')->with(compact('getorder','meta_desc', 'meta_keywords','meta_title','url_canonical'));

			}
		}
		public function history_view_order(Request $request, $order_code){
			$meta_desc = "Lịch sử đơn hàng";
			$meta_keywords = "Lịch sử đơn hàng";
			$meta_title = "Lịch sử đơn hàng";
			$url_canonical = $request->url(); 

			$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
			$order = Order::where('order_code',$order_code)->get();
			foreach($order as $key => $ord){
				$customer_id = $ord->customer_id;
				$shipping_id = $ord->shipping_id;
				$order_status = $ord->order_status;
			}
			$cus = Customer::where('customer_id', $customer_id)->first();
			// $customer = Customer::where('customer_id',$customer_id)->first();
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
			return view('pages.Cart.history_details')->with(compact('order_details','cus','shipping','order_details', 'coupon_condition','coupon_number',
			'order','order_status','meta_desc', 'meta_keywords','meta_title','url_canonical'));

		}
		
}
