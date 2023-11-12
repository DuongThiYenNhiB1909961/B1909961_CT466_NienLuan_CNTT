<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Social;
use App\Models\Login;
use App\Models\SocialCustomers;
use App\Models\Customer;
use App\Models\City;
use App\Models\District;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Coupon;
use Carbon\Carbon;
use Socialite;
use Cart;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Rules\Captcha;
use Validator;
session_start();
class CheckOutController extends Controller
{
    public function vnpay_checkout(Request $request){
        $data = $request->all();
        $code_checkout = rand(00,9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://nhiduongcosmetic.com/My_Project_NL/checkout";
        $vnp_TmnCode = "ZU3N7DTF";//Mã website tại VNPAY 
        $vnp_HashSecret = "IQHXBDDEGRVHPRHLRBLVVYZREIZSYFEI"; //Chuỗi bí mật
        
        $vnp_TxnRef = $code_checkout; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_vnpay'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }
    public function del_fee(){
        Session::forget('fee');
        return redirect()->back();
    }
    public function fee_feeship(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                     foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::put('payment_select',$data['payment_select']);
                        Session::put('shipping_name',$data['shipping_name']);
                        Session::put('shipping_email',$data['shipping_email']);
                        Session::put('shipping_address',$data['shipping_address']);
                        Session::put('shipping_phone',$data['shipping_phone']);
                        Session::put('shipping_note',$data['shipping_note']);
                        Session::save();
                    }
                }else{ 
                    Session::put('fee',35000);
                    Session::put('payment_select',$data['payment_select']);
                    Session::put('shipping_name',$data['shipping_name']);
                    Session::put('shipping_email',$data['shipping_email']);
                    Session::put('shipping_address',$data['shipping_address']);
                    Session::put('shipping_phone',$data['shipping_phone']);
                    Session::put('shipping_note',$data['shipping_note']);
                    Session::save();
                }
            }
           
        }
    }
    public function select_delivery_checkout(Request $request){
        $data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_district = District::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    				$output.='<option>---Chọn quận huyện---</option>';
    			foreach($select_district as $key => $qh){
    				$output.='<option value="'.$qh->maqh.'">'.$qh->name_quanhuyen.'</option>';
    			}

    		}else{

    			$select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    			$output.='<option>---Chọn xã phường---</option>';
    			foreach($select_wards as $key => $ward){
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
    			}
    		}
    		echo $output;
    	}
    
    }

    public function login_customer_google(){
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        return Socialite::driver('google')->redirect();
    }
    public function callback_customer_google(){
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        $users = Socialite::driver('google')->stateless()->user();
        
        $authUser = $this->findOrCreateCustomer($users,'google');
        if($authUser){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        }elseif($customergg){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        }

        return redirect('/checkout')->with('message', 'Đăng nhập Admin thành công');

    }
    public function findOrCreateCustomer($users,$provider){
        $authUser = SocialCustomers::where('provider_user_id', $users->id)->where('provider_user_email', $users->email)->first();
        if($authUser){
            return $authUser;
        }else{
            $customergg = new SocialCustomers([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);
        
            $customer = Customer::where('customer_email',$users->email)->first();
            
            if(!$customer){
                $customer = Customer::create([
                'customer_name' => $users->name,
                'customer_email' => $users->email,
                'customer_picture' => $users->avatar,
                'customer_password' => '',   
                'customer_phone' => '',
                ]);
            }
            $customergg->customer()->associate($customer);
            $customergg->save();
            return $customergg;
        }
    
    }

    public function AuthLogin(){
        if(Session::get('login_normal')){
            $admin_id = Session::get('admin_id');
        }else{
            $admin_id = Auth::id();
        }   
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            }
    }
    // public function view_order($order_code){
    //     $this->AuthLogin();

    //     $order_by_id = DB::table('tb_order')
    //     ->join('tb_customer','tb_order.customer_id','=','tb_customer.customer_id')
    //     ->join('tb_shipping','tb_order.shipping_id','=','tb_shipping.shipping_id')
    //     ->join('tb_order_details','tb_order.order_code','=','tb_order_details.order_code')
    //     ->select('tb_order.*','tb_customer.*','tb_shipping.*','tb_order_details.*')->first();

    //     $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
    //     return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
    // }
    public function login_checkout(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url();

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.Checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function register(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url();

        return view('pages.Checkout.register')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function add_customer(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;

        $customer_id = DB::table('tb_customer')->insertGetId($data);
        Session::put('customer_id',$request->customer_id);
        Session::put('customer_name',$request->customer_name);
        Session::put('customer_email',$request->customer_email);
        Session::put('customer_address',$request->customer_address);
        Session::put('customer_phone',$request->customer_phone);
        return view('pages.Checkout.login_checkout')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function checkout(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        $product = Product::orderby('product_id','desc')->get();
        // $customer = Product::where('customer_id',Session::get('customer_id'))->get();->with('customer',$customer)
        // $customer = Customer::where('customer_id', Session::get('customer_id'))->first();

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $city = City::orderby('matp','ASC')->get();
        return view('pages.Checkout.show_checkout')->with('product',$product)->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('city',$city);
    }
    public function save_checkout(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tb_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/pill');
    }

    public function logout(Request $request){
        // $this->AuthLogin();
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url();

        Session::flush();
        Session::forget('coupon');
        return view('pages.Checkout.login_checkout')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);;
    }
    public function login(Request $request){
        $meta_desc = "Đăng nhập";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Đăng nhập, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        $data = $request->all();
        //$data = $request->validate([
          //  'customer_email' => 'required',
            //'customer_password' => 'required',
            //'g-recaptcha-response' => new Captcha(), //dòng kiểm tra Captcha
            //]);
        

        $customer_email = $data['customer_email'];
        $customer_password = $data['customer_password'];
        $login = Customer::where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();      
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('customer_name',$login->customer_name);
                Session::put('customer_id', $login->customer_id);
                Session::put('customer_email',$login->customer_email);
                Session::put('customer_address',$login->customer_address);
                Session::put('customer_phone',$login->customer_phone);
                return Redirect::to('/checkout')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);;
            }
        }else{
            Session::put('message','Mat khau hoac email sai. Vui long nhap lai');
            return Redirect::to('/login-checkout')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);; 
        }
        

        // $customer_email = $request->customer_email;
        // $customer_password = $request->customer_password;
        
        // $result = DB::table('tb_customer')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
        // if($result){
        //     Session::put('customer_id',$result->customer_id);
        //     return Redirect::to('/checkout');
        // }
        // else{
        //     Session::put('message','Mat khau hoac email sai. Vui long nhap lai');
        //     return Redirect::to('/login-checkout');
        // }
    }
    // public function customer_register(Request $request){

        
        
    //     $customer = new Customer();
    //     $customer->customer_name = $data['customer_name'];
        
    //     $customer->customer_email = $data['customer_email'];
    //     $customer->customer_phone = $data['customer_phone'];
        
    //     $customer->customer_address = $data['customer_address'];
    //     $customer->customer_password = md5($data['customer_password']);
    //     $customer->customer_date = now();
    //     $customer->save();
        
    //     return redirect('/dang-nhap')->with('message', 'Đăng ký tài khoản thành
    //     công,làm ơn đăng nhập');
    //     }
    // public function manage_order(){
    //     $this->AuthLogin();
    //     $all_order = DB::table('tb_order')
    //     ->join('tb_customer','tb_order.customer_id','=','tb_customer.customer_id')
    //     ->select('tb_order.*','tb_customer.customer_name')
    //     ->orderby('tb_order.order_id','desc')->get();

    //     $manager_order = view('admin.manage_order')->with('all_order',$all_order);
    //     return view('admin_layout')->with('admin.manage_order',$manager_order);
    // }
    public function confirm_order(Request $request){
        $data = $request->all();

        if(Session::get('coupon')){
            $coupon = Coupon::where('coupon_code', $data['order_coupon'])->first();
            $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon->save();
        }
       

        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_note = $data['shipping_note'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

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

        
        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails;
                $order_details->order_code = $order_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->coupon =  $data['order_coupon'];
                $order_details->feeship = $data['order_fee'];
                $order_details->save();
            }
         }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }
}

