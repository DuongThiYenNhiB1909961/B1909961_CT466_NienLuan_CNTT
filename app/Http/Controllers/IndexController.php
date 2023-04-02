<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class IndexController extends Controller
{
    public function index(){
        return view('pages.home');
    }
    public function introduce(){
        return view('pages.introduce');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function login(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.Checkout.register');
    }
    public function product(){
        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        $all_product = DB::table('tb_product')->where('product_status','0')->orderby('product_id','desc')->get();
        return view('pages.product')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        $search_product = DB::table('tb_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }
}
