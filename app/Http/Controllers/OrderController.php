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
use App\Models\Vnpay;
use Carbon\Carbon;
use Session;
class OrderController extends Controller
{
	public function huydon(Request $request){
		$data = $request->all();
		$order_code = $data['order_code'];
		$order = Order::where('order_code',$order_code)->first();
		$order->order_destroy = $data['lydo'];
		$order->order_status = 3;
		$order->save();
	}
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


		if($order->order_status==1){
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
				$now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');

				foreach($data['quantity'] as $key2 => $qty){
						if($key1 == $key2){
								$pro_remain = $product_quantity - $qty;
								$product->product_qty = $pro_remain;
								$product->product_sold = $product_sold + $qty;
								$product->save();

								$quantity += $qty;
								$sales += $product_price*$qty;
								$profit += ($product_price*$qty) - ($product_price_buy*$qty);
						}
				}
			}
			if($statistical_count>0){
				$statistical_update = Statistical::where('order_date',$order_date)->first();
				$statistical_update->sales = $statistical_update->sales + $sales;
				$statistical_update->profit = $statistical_update->profit + $profit;
				$statistical_update->quantity_order = $statistical_update->quantity_order + $quantity;
				$statistical_update->total_order = $statistical_update->total_order + 1;
				$statistical_update->save();
			}else{
				$statistical_new = new Statistical();
				$statistical_new->order_date = $order_date;
				$statistical_new->sales = $sales;
				$statistical_new->profit = $profit;
				$statistical_new->quantity_order = $quantity;
				$statistical_new->total_order = $total_order+1;
				$statistical_new->save();
			}

		}
		
	}
    public function manage_order(){
        $all_order = Order::orderby('created_at','DESC')->get();
        return view('admin.manage_order')->with('all_order',$all_order);
    }
    public function view_order($order_id){
        $order = Order::where('order_id',$order_id)->get();
		
		
		foreach($order as $key => $ord){
			$order_code = $ord->order_code;
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
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
		$code = $order_code;
		return view('admin.view_order')->with(compact('order_details','cus','shipping','order_details',
		'coupon_condition','coupon_number','order','order_status','code'));

        }
		public function delete_order($order_code){
			$order = Order::where('order_code',$order_code)->delete();
			Session::put('message','Xóa đơn hàng thành công');
			return Redirect()->Back();
		}
		public function history(Request $request){
			if(isset($_GET['vnp_Amount'])){
				$data_vnpay = new Vnpay([
					'vnp_Amount' => $_GET['vnp_Amount'],
					'vnp_BankCode' => $_GET['vnp_BankCode'],
					'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
					'vnp_CardType' => $_GET['vnp_CardType'],
					'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
					'vnp_PayDate' => $_GET['vnp_PayDate'],
					'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
					'vnp_TmnCode' => $_GET['vnp_TmnCode'],
					'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
					'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
					'vnp_TxnRef' => $_GET['vnp_TxnRef'],
					'vnp_SecureHash' => $_GET['vnp_SecureHash']
				]);
				$data_vnpay->save();

				if(Session::get('coupon')){
					$coupon = Coupon::where('coupon_code', Session::get('coupon'))->first();
					$coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
					$coupon->coupon_time = $coupon->coupon_time - 1;
					$coupon->save();
				}
			   
		
				$shipping = new Shipping();
				$shipping->shipping_name = Session::get('shipping_name');
				$shipping->shipping_email = Session::get('shipping_email');
				$shipping->shipping_address = Session::get('shipping_address');
				$shipping->shipping_phone = Session::get('shipping_phone');
				$shipping->shipping_note = Session::get('shipping_note');
				$shipping->shipping_method = Session::get('payment_select');
				$shipping->save();
				$shipping_id = $shipping->shipping_id;
		
				$order_code = substr(md5(microtime()),rand(0,26),5);
		
				$order = new Order();
				$order->customer_id = Session::get('customer_id');
				$order->shipping_id = $shipping_id;
				$order->order_status = 0;
				$order->order_code = $data_vnpay->vnp_TxnRef;
				
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        		$created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
						
				$order->order_date = $order_date;
				$order->created_at = $created_at;
				$order->save();
				
				if(Session::get('cart')==true){
					foreach(Session::get('cart') as $key => $cart){
						$order_details = new OrderDetails;
						$order_details->order_code = $data_vnpay->vnp_TxnRef;
						$order_details->customer_id = Session::get('customer_id');
						$order_details->product_id = $cart['product_id'];
						$order_details->product_name = $cart['product_name'];
						$order_details->product_price = $cart['product_price'];
						$order_details->product_sales_quantity = $cart['product_qty'];
						if(Session::get('fee')){
							$order_details->feeship =  Session::get('fee');
						}else{
							$order_details->feeship =  35000;
						}
						if(Session::get('coupon')){
							foreach(Session::get('coupon') as $key => $cou){
								$order_details->coupon =  $cou['coupon_code'];
							}
						}else{
							$order_details->coupon =  'no';
						}
						$order_details->save();
					}
				 }
				Session::forget('coupon');
				Session::forget('fee');
				Session::forget('cart');
			}elseif(isset($_GET['thanhtoan'])=='paypal'){
				// thêm vào shipping
				$shipping = new Shipping();
				$shipping->shipping_name = Session::get('shipping_name');
				$shipping->shipping_email = Session::get('shipping_email');
				$shipping->shipping_address = Session::get('shipping_address');
				$shipping->shipping_phone = Session::get('shipping_phone');
				$shipping->shipping_note = Session::get('shipping_note');
				$shipping->shipping_method = Session::get('payment_select');
				$shipping->save();
				$shipping_id = $shipping->shipping_id;
		
				// Thêm vào ordre
				$order_code = substr(md5(microtime()),rand(0,26),5);
				
				$order = new Order();
				$order->customer_id = Session::get('customer_id');
				$order->shipping_id = $shipping_id;
				$order->order_status = 0;
				$order->order_code = $order_code;
				
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        		$created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
						
				$order->order_date = $order_date;
				$order->created_at = $created_at;
				$order->save();
		
				// Thêm vào chi tiết đơn hàng

				if(Session::get('coupon')){
					$coupon = Coupon::where('coupon_code', Session::get('coupon'))->first();
					$coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
					$coupon->coupon_time = $coupon->coupon_time - 1;
					$coupon->save();
				}
				
				if(Session::get('cart')==true){
					foreach(Session::get('cart') as $key => $cart){
						$order_details = new OrderDetails;
						$order_details->order_code = $order_code;
						$order_details->customer_id = Session::get('customer_id');
						$order_details->product_id = $cart['product_id'];
						$order_details->product_name = $cart['product_name'];
						$order_details->product_price = $cart['product_price'];
						$order_details->product_sales_quantity = $cart['product_qty'];
						if(Session::get('fee')){
							$order_details->feeship =  Session::get('fee');
						}else{
							$order_details->feeship =  35000;
						}
						if(Session::get('coupon')){
							foreach(Session::get('coupon') as $key => $cou){
								$order_details->coupon =  $cou['coupon_code'];
							}
						}else{
							$order_details->coupon =  'no';
						}
						
						$order_details->save();
					}
				}
				Session::forget('coupon');
				Session::forget('fee');
				Session::forget('cart');
			}
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
