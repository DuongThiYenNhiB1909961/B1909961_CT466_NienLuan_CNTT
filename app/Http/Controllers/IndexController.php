<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Coupon;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Redirect;
session_start();
class IndexController extends Controller
{
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

        $all_product = DB::table('tb_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(12); 
        return view('pages.home')->with('now',$now)->with('coupon',$coupon)->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('all_product',$all_product)->with('slider',$slider)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
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

        return view('pages.product')->with('min_price',$min_price)->with('max_price',$max_price)->with('max_add',$max_add)
        ->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
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
        return view('pages.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
