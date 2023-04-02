<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CheckOutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        return view('pages.Checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tb_customer')->insertGetId($data);
        Session::put('customer_id',$request->customer_id);
        Session::put('customer_name',$request->customer_name);
        return view('pages.Checkout.login_checkout');
    }
    public function checkout(){
        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        return view('pages.Checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);
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
    public function pill(){
        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        return view('pages.Checkout.pill')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function checkout_by(Request $request){
        // Thêm vào pill
        $data = array();
        $data['pill_method'] = $request->payment_option;
        $data['pill_status'] = "Chờ xử lý";
        $pill_id = DB::table('tb_pill')->insertGetId($data);
        
        // thêm vào order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['pill_id'] = $pill_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = "Chờ xử lý";
        $order_id = DB::table('tb_order')->insertGetId($order_data);

        // thêm vào order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $v_content->id;
            $order_details_data['product_name'] = $v_content->name;
            $order_details_data['product_price'] = $v_content->price;
            $order_details_data['product_sales_quantity'] = $v_content->qty;
            $order_details_id = DB::table('tb_order_details')->insert($order_details_data);

        }
        if($data['pill_method']!=NULL){
            Cart::destroy();
            $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
            $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
            return view('pages.Checkout.cash')->with('category',$cate_product)->with('brand',$brand_product);
        }else{
            $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
            $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
            return view('pages.Checkout')->with('category',$cate_product)->with('brand',$brand_product);
        }
        // Session::put('shipping_id',$shipping_id);
        // return Redirect('/pill');
    }

    public function logout(){
        // $this->AuthLogin();
        Session::flush();
        return view('pages.Checkout.login_checkout');
    }
    public function login(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;
        
        $result = DB::table('tb_customer')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }
        else{
            Session::put('message','Mat khau hoac email sai. Vui long nhap lai');
            return Redirect::to('/login-checkout');
        }
    }
}

