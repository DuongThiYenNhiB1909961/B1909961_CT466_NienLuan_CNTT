<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class CategoryProduct extends Controller
{
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
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tb_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $date = array();
        $date['category_name'] = $request->category_product_name;
        $date['meta_keywords'] = $request->category_product_keywords;
        $date['category_desc'] = $request->category_product_desc;
        $date['category_status'] = $request->category_product_status;
        
        DB::table('tb_category_product')->insert($date);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
    }
    public function unactive_category_product($id){
        $this->AuthLogin();
        DB::table('tb_category_product')->where('id',$id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($id){
        $this->AuthLogin();
        DB::table('tb_category_product')->where('id',$id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tb_category_product')->where('id',$id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function update_category_product(Request $request, $id){
        $this->AuthLogin();
        $date = array();
        $date['category_name'] = $request->category_product_name;
        $date['meta_keywords'] = $request->category_product_keywords;
        $date['category_desc'] = $request->category_product_desc;
        DB::table('tb_category_product')->where('id',$id)->update($date);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($id){
        $this->AuthLogin();
        DB::table('tb_category_product')->where('id',$id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    // show_category
    public function show_category($category_id, Request $request){

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        $category_by_id = DB::table('tb_product')->join('tb_category_product','tb_product.category_id','=','tb_category_product.id')
        ->where('tb_product.category_id',$category_id)->get();
        foreach($category_by_id as $key => $val){
            $meta_desc = $val->category_desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->category_name;
            $url_canonical = $request->url(); 
        }

        return view('pages.show_cate')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    
}