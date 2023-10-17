<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();
class IndexController extends Controller
{
    public function index(Request $request){
        $slider = Slider::orderby('slider_id','DESC')->get();

        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get(); 
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get(); 
        
        $all_product = DB::table('tb_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(10); 
        return view('pages.home')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('all_product',$all_product)->with('slider',$slider)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
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

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        $all_product = DB::table('tb_product')->where('product_status','0')->orderby('product_id','desc')->get();
        return view('pages.product')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function search(Request $request){
        $meta_desc = "Chuyên cung cấp các loại mỹ phẩm chính hãng, đa dạng về mẫu mã và công dụng";
        $meta_keywords = "shop my pham, shop mỹ phẩm, của hàng mỹ phẩm chính hãng";
        $meta_title = "Mỹ phẩm chính hãng, an tâm sử dụng làm đẹp";
        $url_canonical = $request->url(); 

        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        $search_product = DB::table('tb_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
