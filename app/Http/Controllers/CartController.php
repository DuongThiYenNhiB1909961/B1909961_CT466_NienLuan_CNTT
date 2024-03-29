<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function hover_cart(){
        // {{asset('public/uploads/product/body570.jpg')}}{{asset('/del-product/'.$cart['session_id'])}}
        $count = 0;
        $count = count(Session::get('cart'));
        $output = '';
        if($count>0){
            
            $output .= '<ul class="hover-cart"> 
        <li><center>
            <a class="all-cart" href="'.asset('/show-cart-ajax').'" style="font-size:12px; color:#e39797;">
                Xem giỏ hàng
            </a>
        </center></li>';
            foreach(Session::get('cart') as $key => $value){
                $output .= '<li><a href="'.asset('/show-cart-ajax').'">
                                    <img src="'.asset('public/uploads/product/'.$value['product_image']).'">
                                    <p class="text-danger" style="font-size:15px;">'.number_format($value['product_price'],0,',','.').'vnđ</p>
                                    <p class="text-danger" style="font-size:15px;">Số lượng: '.$value['product_qty'].'</p>
                                </a>
                                <center>
                                <a class="del-cart" href="'.url('/del-product/'.$value['session_id']).'">
                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                </a>
                                </center>
                               
                            </li>';
            }
                $output .= '</ul>';
        }else{
            $output .='<ul class="hover-cart">
                        <li?><p>Giỏ hàng rỗng</p></li>
                        </ul>';
        }
        
                  
        echo $output;
    }
    public function show_cart_number(){
        // $count = 0;
        $count = count(Session::get('cart'));
        $output = '';
        if(Session::get('cart')){
            $output .= '<span class="badges">'.$count.'</span>';
        }else{
            $output .= '<span class="badges">0</span>';
        }
                  
        echo $output;
    }
    public function show_cart_ajax(Request $request){
        $cart = Session::get('cart');
        $meta_desc = "Giỏ hàng mỹ phẩm";
        $meta_keywords = "Giỏ hàng ajax";
        $meta_title = "Giỏ hàng ajax";
        $url_canonical = $request->url(); 

        $coupon = Coupon::orderby('coupon_id','DESC')->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.Cart.cart_ajax')->with('now',$now)->with('coupon',$coupon)->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        // print_r($data);
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],                
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],                
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],                
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],                
                );
                Session::put('cart',$cart);
        }
       
        Session::save();
    }   
    public function delete_product($session_id){
        $cart = Session::get('cart');
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return Redirect::to('/show-cart-ajax')->with('message','Xóa sản phẩm thành công');

        }else{
            return Redirect::to('/show-cart-ajax')->with('message','Xóa sản phẩm thất bại');
        }
    }
    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            $message = '';
            foreach($data['cart_qty'] as $key => $qty){
                $i=0;
                foreach($cart as $session => $val){
                    $i++;
                    if($val['session_id']==$key && $qty < $cart[$session]['product_quantity']){
                        $cart[$session]['product_qty'] = $qty;
                        $message .= $i.'. Cập nhật số lượng: '.$cart[$session]['product_name'].' thành công <br>';
                    }elseif($val['session_id']==$key && $qty > $cart[$session]['product_quantity']){
                        $message .= $i.'. Cập nhật số lượng: '.$cart[$session]['product_name'].' thất bại. Vui lòng chọn số lượng nhỏ hơn <br>';
                    }
                }
            }
            Session::put('cart',$cart);
            return Redirect::to('/show-cart-ajax')->with('message',$message);
        }else{
            return Redirect::to('/show-cart-ajax')->with('message','Cập nhật số lượng thất bại');
        }
    }
    public function delete_all_product(){
        $cart = Session::get('cart');
        if($cart==true){
            // Session::destroy();
            Session::forget('cart');
            Session::forget('coupon'); 
            return redirect()->back()->with('message','Đã xóa tất cả sản phẩm');
        }
        else{
            return redirect()->back()->with('message','Vui lòng thêm sản phẩm vào giỏ hàng');
        }
    }
    public function save_cart(Request $request){ 
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tb_product')->where('product_id', $productId)->first();

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/show-cart');
    }
    public function show_cart(Request $request){
        $meta_desc = "Giỏ hàng mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Giỏ hàng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url();

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
