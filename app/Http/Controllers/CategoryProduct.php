<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
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
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $get_image = $request->file('category_image');
        
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/cate',$new_image);
            $data['category_image']=$new_image;
            DB::table('tb_category_product')->insert($data);
            Session::put('message','Thêm danh mục thành công');
            return Redirect::to('add-category-product');
        }
        $data['category_image']= '';
        DB::table('tb_category_product')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect::to('add-category-product');
    }
    public function unactive_category_product($id){
        $this->AuthLogin();
        DB::table('tb_category_product')->where('category_id',$id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($id){
        $this->AuthLogin();
        DB::table('tb_category_product')->where('category_id',$id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tb_category_product')->where('category_id',$id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function update_category_product(Request $request, $id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        $get_image = $request->file('category_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/cate',$new_image);
            $data['category_image']=$new_image;
            DB::table('tb_category_product')->where('category_id',$id)->update($data);
            Session::put('message','Cập nhật danh mục sản phẩm thành công');
            return Redirect::to('all-category-product');
        }
        DB::table('tb_category_product')->where('category_id',$id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($id){
        $this->AuthLogin();
        DB::table('tb_category_product')->where('category_id',$id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    // show_category
    public function show_category($slug_category_product, Request $request){
        $cate_product = Category::where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category_by_slug = Category::where('slug_category_product',$slug_category_product)->get();
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');

        foreach($category_by_slug as $key => $cate){
            $category_id = $cate->category_id;
        }
// ->paginate(6)->appends(request()->query())$category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','DESC')->get();
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $category_by_id = DB::table('tb_product')->join('tb_category_product','tb_product.category_id','=','tb_category_product.category_id')
        ->where('tb_product.category_id',$category_id)->where('tb_category_product.slug_category_product',$slug_category_product)->orderBy('tb_product.product_price','DESC')->paginate(6)->appends(request()->query());
            }
            elseif($sort_by == 'tang_dan'){
                $category_by_id = DB::table('tb_product')->join('tb_category_product','tb_product.category_id','=','tb_category_product.category_id')
        ->where('tb_product.category_id',$category_id)->where('tb_category_product.slug_category_product',$slug_category_product)->orderBy('tb_product.product_price','ASC')->paginate(6)->appends(request()->query());
            }
            elseif($sort_by == 'az'){
                $category_by_id = DB::table('tb_product')->join('tb_category_product','tb_product.category_id','=','tb_category_product.category_id')
        ->where('tb_product.category_id',$category_id)->where('tb_category_product.slug_category_product',$slug_category_product)->orderBy('tb_product.product_name','ASC')->paginate(6)->appends(request()->query());
            }
            elseif($sort_by == 'za'){
                $category_by_id = DB::table('tb_product')->join('tb_category_product','tb_product.category_id','=','tb_category_product.category_id')
        ->where('tb_product.category_id',$category_id)->where('tb_category_product.slug_category_product',$slug_category_product)->orderBy('tb_product.product_name','DESC')->paginate(6)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min = $_GET['start_price'];
            $max = $_GET['end_price'];

            $category_by_id = DB::table('tb_product')->join('tb_category_product','tb_product.category_id','=','tb_category_product.category_id')
        ->where('tb_product.category_id',$category_id)->whereBetween('tb_product.product_price',[$min, $max])->orderBy('tb_product.product_price','ASC')->paginate(6)->appends(request()->query());            
        }else{
            $category_by_id = DB::table('tb_product')->join('tb_category_product','tb_product.category_id','=','tb_category_product.category_id')
        ->where('tb_product.category_id',$category_id)->where('tb_category_product.slug_category_product',$slug_category_product)->orderBy('tb_product.product_id','DESC')->paginate(6);
        }

        
        
        $category_pro = DB::table('tb_category_product')->where('tb_category_product.slug_category_product',$slug_category_product)
        ->limit(1)->get();
        foreach($category_pro as $key => $val){
            $meta_desc = $val->category_desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->category_name;
            $url_canonical = $request->url(); 
        }
        foreach($category_by_id as $key => $val){
            $product_id = $val->product_id;
        }
        
        $rating = Rating::where('product_id', $product_id)->avg('rating');
        $rating = round($rating);
        return view('pages.show_cate')->with('min_price',$min_price)->with('max_price',$max_price)->with('category_by_id',$category_by_id)->with('category',$cate_product)->with('brand',$brand_product)->with('category_pro',$category_pro)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('rating',$rating);
    }
    
}