<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Coupon;
use App\Models\Customer;
use Carbon\Carbon;
use Auth;
use Mail;
use Illuminate\Support\Facades\Redirect;
session_start();
class IndexController extends Controller
{
    public function AuthLogin(){
        if(Session::get('login_normal')){
            $customer_id = Session::get('customer_id');
        }else{
            $customer_id = Auth::id();
        }   
            if($customer_id){
                return Redirect::to('login-checkout');
            }else{
                return Redirect::to('/')->send();
            }
    }
    public function edit_user(Request $request, $customer_id){
        $this->AuthLogin();
        $meta_desc = "Cập nhật thông tin cá nhân";
        $meta_keywords = "Cập nhật thông tin cá nhân";
        $meta_title = "Cập nhật thông tin cá nhân";
        $url_canonical = $request->url(); 

        $edit_user = Customer::where('customer_id',$customer_id)->get();
        return view('pages.edit_user')->with('edit_user',$edit_user)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);;
    }
    public function update_user(Request $request, $customer_id){
        $this->AuthLogin();
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = $request->customer_password;

        DB::table('tb_customer')->where('customer_id',$customer_id)->update($data);
        Session::put('customer_name',$request->customer_name);
        Session::put('customer_id', $request->customer_id);
        Session::put('customer_email',$request->customer_email);
        Session::put('customer_address',$request->customer_address);
        Session::put('customer_phone',$request->customer_phone);
        Session::put('message','Cập nhật thông tin thành công');
        return Redirect::to('/checkout');
    }
    public function load_more(){
        // $data = $request->all();
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $all_product = Product::where('product_status','0')->orderby('product_price','desc')->get();
            }
            elseif($sort_by == 'tang_dan'){
                $all_product = Product::where('product_status','0')->orderby('product_price','asc')->get();
            }
            elseif($sort_by == 'az'){
                $all_product = Product::where('product_status','0')->orderby('product_name','asc')->get();
            }
            elseif($sort_by == 'za'){
                $all_product = Product::where('product_status','0')->orderby('product_name','desc')->get();
            }
        }
        elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min = $_GET['start_price'];
            $max = $_GET['end_price'];

            $all_product = Product::where('product_status','0')->whereBetween('tb_product.product_price',[$min, $max])->orderBy('tb_product.product_price','ASC')->paginate(6)->appends(request()->query());            

        }else{
            $all_product = Product::where('product_status','0')->orderby('product_id','desc')->get();
        }

        // if(isset($_GET['sort_by'])){
        //     $all_product = Product::where('product_status','0')->where('product_id','<',$data['id'])->orderby('product_id','desc')->take(12)->get();
        // }else{
        //     $all_product = Product::where('product_status','0')->orderby('product_id','desc')->take(12)->get();
        // }
        $output = '';
        if(!$all_product -> isEmpty()){
            foreach($all_product as $key => $product){
                $rating = Rating::where('product_id', $product->product_id)->avg('rating');
                $rating = round($rating);
                $last_id = $product->product_id;
                $output .= '<div class="mr-4 mb-4 shadow">
                                <a href="'.url('/product-detail/'.$product->product_id).'" class="text-decoration-none">
                                    <div class="card" style="width: 14rem; height: 23rem;">
                                        <img src="'.asset('public/uploads/product/'.$product->product_image).'" class="card-img-top shadow" alt="">
                                        <div class="card-body">
                                            <h6 class="card-title" style="width:height: 5rem; font-size: 0.78em">'.$product->product_name.'</h6>
                                            <b><p class="card-text text-danger">'.number_format($product->product_price,0,',','.').' đ <span class="badges">-'.number_format(100-($product->product_price*100/$product->product_price_real),0,',','.'). '%</span></p></b>
                                            <p class="card-text text-body" style="font-size: 15px; text-decoration-line: line-through">'.number_format($product->product_price_real,0,',','.').' đ</p>
                                            <p class="card-text text-body" style="font-size: 12px; ">Đã bán: '.$product->product_sold.'</p>
                                        </div>
                                    </div>';
                                        for($count=1; $count<=5; $count++){
                                            if($count <= $rating){
                                                $color = 'color: #ffcc00;';
                                            }else {
                                                $color = 'color: #ccc;';
                                            }
                                            $output .= '
                                            <li title="Đánh giá sao" 
                                                id="'.$product->product_id-$count.'"
                                                data-index="'.$count.'" 
                                                data-product_id="'.$product->product_id.'" 
                                                data-rating="'.$rating.'" 
                                                class="list-inline-item"
                                                style="cursor: pointer;'.$color.' font-size: 30px;" >
                                                &#9733;
                                            </li>
                                            ';
                                        }                
                                        $output .= '<p class="text-danger list-inline-item" style="font-size:17px">'.$rating.'/5</p>
                                        
                                </a>
                            </div>';
            }
            $output .= '<br><div id="load_more" style="text-align: center; margin: 0 auto;}" class="mb-2">
                            <center>
                                <button name="load_more_button" data-id="'.$last_id.'" id="load_more_button">
                                    <i class="fa fa-caret-down" aria-hidden="true">Load more</i>
                                </button>
                            </center>
                            </div>';
        }
        else{
            $output .= '<br><div id="load_more" style="text-align: center; margin: 0 auto;}">
                            <center>
                                <button class="" name="load_more_button">
                                    <i class="fa fa-caret-down" aria-hidden="true">Loading...</i>
                                </button>
                            </center>
                            </div>';
        }
        echo $output;
    }
    public function home_product(Request $request){
        $all_product = Product::where('product_status','0')->orderby('product_id','desc')->take(12)->get();
        $output = '';
        if(!$all_product -> isEmpty()){
            foreach($all_product as $key => $product){
                $rating = Rating::where('product_id', $product->product_id)->avg('rating');
                $rating = round($rating);
                $last_id = $product->product_id;
                $output .= '<div class="mr-4 mb-4 shadow">
                                <a href="'.url('/product-detail/'.$product->product_id).'" class="text-decoration-none">
                                    <div class="card" style="width: 14rem; height: 23rem;">
                                        <img src="'.asset('public/uploads/product/'.$product->product_image).'" class="card-img-top shadow" alt="">
                                        <div class="card-body">
                                            <h6 class="card-title" style="width:height: 5rem; font-size: 0.78em">'.$product->product_name.'</h6>
                                            <b><p class="card-text text-danger">'.number_format($product->product_price,0,',','.').' đ <span class="badges">-'.number_format(100-($product->product_price*100/$product->product_price_real),0,',','.'). '%</span></p></b>
                                            <p class="card-text text-body" style="font-size: 15px; text-decoration-line: line-through">'.number_format($product->product_price_real,0,',','.').' đ </p>
                                            <p class="card-text text-body" style="font-size: 12px; ">Đã bán: '.$product->product_sold.'</p>
                                        </div>
                                    </div>';
                                        for($count=1; $count<=5; $count++){
                                            if($count <= $rating){
                                                $color = 'color: #ffcc00;';
                                            }else {
                                                $color = 'color: #ccc;';
                                            }
                                            $output .= '
                                            <li title="Đánh giá sao" 
                                                id="'.$product->product_id-$count.'"
                                                data-index="'.$count.'" 
                                                data-product_id="'.$product->product_id.'" 
                                                data-rating="'.$rating.'" 
                                                class="list-inline-item"
                                                style="cursor: pointer;'.$color.' font-size: 20px;" >
                                                &#9733;
                                            </li>
                                            ';
                                        }                
                                        $output .= '<p class="text-danger list-inline-item" style="font-size:17px">'.$rating.'/5</p>
                                        
                                </a>
                            </div>';
            }
            
        }
        echo $output;
    }
    public function send_mail(){
        //send mail
               $to_name = "Nhi admin";
               $to_email = "nhib1909961@student.ctu.edu.vn";//send to this email
              
            
               $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php
               
               Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

                   $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
                   $message->from($to_email,$to_name);//send from this mail
               });
               return view('pages.send_mail')->with('message','');
               //--send mail
   }
    public function autocomplete(Request $request){
        $data = $request->all();

        if($data['query']){
            $product = Product::where('product_status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block; position: absolute; top: 34px;left: 0px; width: 50%; z-index: 600;">';
            foreach($product as $key => $val){
                $output .= '
                <li class="ml-2"><a href="#">'.$val->product_name.'</a></li><hr>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    public function index(Request $request){
        $slider = Slider::orderby('slider_id','DESC')->get();

        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
        $coupon = Coupon::orderby('coupon_id','DESC')->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');

        $all_product = Product::where('product_status','0')->orderby('product_id','desc')->take(12)->get();
        foreach($all_product as $key => $val){
            $product_id = $val->product_id;
        }
        
        $rating = Rating::where('product_id', $product_id)->avg('rating');
        $rating = round($rating);
        return view('pages.home')->with('rating',$rating)->with('now',$now)->with('coupon',$coupon)->with('category',$cate_product)->with('brand_product',$brand_product)->with('all_product',$all_product)->with('slider',$slider)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function introduce(Request $request){
        $meta_desc = "Mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Giới thiệu các loại mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        return view('pages.introduce')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function contact(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Liên hệ mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        return view('pages.contact')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function login(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        return view('pages.login')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    
    public function product(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        $max_add = $max_price + 500000;

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $all_product = Product::where('product_status','0')->orderby('product_price','desc')->get();
            }
            elseif($sort_by == 'tang_dan'){
                $all_product = Product::where('product_status','0')->orderby('product_price','asc')->get();
            }
            elseif($sort_by == 'az'){
                $all_product = Product::where('product_status','0')->orderby('product_name','asc')->get();
            }
            elseif($sort_by == 'za'){
                $all_product = Product::where('product_status','0')->orderby('product_name','desc')->get();
            }
        }
        elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min = $_GET['start_price'];
            $max = $_GET['end_price'];

            $all_product = Product::where('product_status','0')->whereBetween('tb_product.product_price',[$min, $max])->orderBy('tb_product.product_price','ASC')->paginate(6)->appends(request()->query());            

        }else{
            $all_product = Product::where('product_status','0')->orderby('product_id','desc')->get();
        }
        // if($data['id']>0){
        //     $all_product = Product::where('product_status','0')->where('product_id','<',$data['id'])->orderby('product_id','desc')->take(12)->get();
        // }
        foreach($all_product as $key =>  $pro){
            $id = $pro->product_id;
        }
        $customer_id=Session::get('customer_id');
        $rating = Rating::where('product_id', $id)->where('customer_id',Session::get('customer_id'))->avg('rating');
        $rating = round($rating);
        return view('pages.product')
        ->with('category',$cate_product)->with('all_product',$all_product)->with('rating',$rating)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function search(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $search_product = DB::table('tb_product')->where('product_name','like','%'.$keywords.'%')->get();
        foreach($search_product as $key => $val){
            $product_id = $val->product_id;
        }
        
        $customer_id=Session::get('customer_id');
        $rating = Rating::where('product_id', $product_id)->where('customer_id',$customer_id)->avg('rating');
        $rating = round($rating);
        return view('pages.search')->with('rating',$rating)->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
