<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class BrandProduct extends Controller
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
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product = DB::table('tb_brand')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_keywords'] = $request->brand_product_keywords;
        $data['brand_status'] = $request->brand_product_status;
        
        DB::table('tb_brand')->insert($data);
        Session::put('message','Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('add-brand-product');
    }
    public function unactive_brand_product($id){
        $this->AuthLogin();
        DB::table('tb_brand')->where('id',$id)->update(['brand_status'=>1]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product($id){
        $this->AuthLogin();
        DB::table('tb_brand')->where('id',$id)->update(['brand_status'=>0]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($id){
        $this->AuthLogin();
        $edit_brand_product = DB::table('tb_brand')->where('id',$id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function update_brand_product(Request $request, $id){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_keywords'] = $request->brand_product_keywords;
        DB::table('tb_brand')->where('id',$id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($id){
        $this->AuthLogin();
        DB::table('tb_brand')->where('id',$id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    // show_brand
    public function show_brand($brand_id, Request $request){
        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('id','desc')->get();
        $brand_by_id = DB::table('tb_product')->join('tb_brand','tb_product.brand_id','=','tb_brand.id')
        ->where('tb_product.brand_id',$brand_id)->get();
        foreach($brand_by_id as $key => $val){
            $meta_desc = $val->brand_desc;
            $meta_keywords = $val->brand_keywords;
            $meta_title = $val->brand_name;
            $url_canonical = $request->url(); 
        }
        return view('pages.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);;
    }
}
