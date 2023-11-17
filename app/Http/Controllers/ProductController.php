<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Http\Requests;
use App\Models\Gallery;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Statistical;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
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
    public function add_rating(Request $request){
        $product_id = $request->product_id;
        $index = $request->index;
        $rating = new Rating();
        $rating->product_id = $product_id;
        $rating->rating = $index;
        $rating->customer_id = Session::get('customer_id');
        $rating->save();
        echo 'done';
    }
    public function reply_cmt(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment_content = $data['comment'];
        $comment->comment_name = 'ShopThienDuongLamDep';
        $comment->product_id = $data['product_id'];
        $comment->comment_parent_cmt = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->save();
    }
    public function list_cmt(){
        $comment = Comment::with('product')->where('comment_parent_cmt','=','0')->orderBy('comment_status','DESC')->orderBy('comment_id','DESC')->get();
        $comment_rep = Comment::with('product')->where('comment_parent_cmt','>','0')->orderBy('comment_id','DESC')->get();
        return view('admin.comment.list_comment')->with('comment',$comment)->with('comment_rep',$comment_rep);
    }
    public function unactive_comment($comment_id){
        $this->AuthLogin();
        Comment::where('comment_id',$comment_id)->update(['comment_status'=>1]);
        Session::put('message','Tắt bình luận thành công');
        return redirect()->back();
    }
    public function active_comment($comment_id){
        $this->AuthLogin();
        Comment::where('comment_id',$comment_id)->update(['comment_status'=>0]);
        Session::put('message','Duyệt bình luận thành công');
        return redirect()->back();
    }
    public function delete_comment($comment_id){
        $this->AuthLogin();
        Comment::where('comment_id',$comment_id)->delete();
        Session::put('message','Xóa bình luận thành công');
        return Redirect()->back();
    }
    public function load_cmt(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('product_id',$product_id)->where('comment_parent_cmt','=','0')->where('comment_status',0)->get();
        $comment_rep = Comment::with('product')->where('comment_parent_cmt','>','0')->orderBy('comment_id','DESC')->get();
        $output = '';
        foreach($comment as $key => $cmt){
            $output .= '
                <div class="row shadow my-2" id="reviews" style="margin: 10px 10px; border: 1px solid rgb(216, 213, 213)">
                    <div class="col-sm-2" align="center">';

                    if(Session::get('customer_picture')){
                        $output .= '<img style="margin: 15px 0;" src="'.Session::get('customer_picture').'" width="50%" class="img img-responsive img-thumbnail">';
                    }else{
                        $output .= '<img style="margin: 15px 0;" src="'.url('/public/uploads/product/user1.png').'" width="50%" class="img img-responsive img-thumbnail">  ';
                    }
                       
                    $output .= '</div>
            
                    <div class="col-sm-10">
                        <p style="color: green;">@'.$cmt->comment_name.'</p>
                        <i style="color: #000; font-size:15px">'.$cmt->comment_date.'</i>
                        <p>'.$cmt->comment_content.'</p>
                    </div>
                </div><p></p>
            ';

            foreach($comment_rep as $key => $cmt_rep){
                if($cmt_rep->comment_parent_cmt == $cmt->comment_id){
                    $output .= '
                    <div class="row shadow my-2 admin" style="margin-left: 10rem; margin-right: 10px; font-size: 18px; background-color:rgb(216, 213, 213); border: 1px solid rgb(216, 213, 213)">
                        <div class="col-sm-2" align="center">
                        <img style="margin: 15px 0;" src="'.url('/public/uploads/product/user2.jpg').'" width="50%" class="img img-responsive img-thumbnail">     
                        </div>
                
                        <div class="col-sm-10">
                            <p style="color: green;">@ShopThienDuongLamDep</p>
                            <i style="color: #000; font-size:15px">'.$cmt_rep->comment_date.'</i>
                            <p>'.$cmt_rep->comment_content.'</p>
                        </div>
                    </div><p></p>
                    ';
                }
        }
        }
        echo $output;
    }
    public function send_cmt(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment_content = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->product_id = $product_id;
        $comment->comment_status = 1;
        $comment->comment_parent_cmt = 0;
        $comment->save();
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tb_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tb_product')
        // ->orderby('product_id','desc')->get();
        ->join('tb_category_product','tb_category_product.category_id','=','tb_product.category_id')
        ->join('tb_brand','tb_brand.brand_id','=','tb_product.brand_id')
        ->orderby('product_id','desc')->get();

        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('y-m-d');

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['product_price'] = $request->product_price;
        $data['product_price_buy'] = $request->product_price_buy;
        $data['product_price_real'] = $request->product_price_real;
        $data['product_qty'] = $request->product_qty;
        $data['product_sold'] = 0;
        $data['product_capacity'] = $request->product_capacity;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_views'] = 0;
        $data['product_status'] = $request->product_status;
        $data['date_add_product'] = $now;
        $get_image = $request->file('product_image');

        $path = 'public/uploads/product/';
        $path_gallery = 'public/uploads/gallery/';
        
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            File::copy($path.$new_image,$path_gallery.$new_image);
            $data['product_image']=$new_image;
            
        }
        $pro_id = DB::table('tb_product')->insertGetId($data);
        $gallery = new Gallery();
        $gallery->gallery_image = $new_image;
        $gallery->gallery_name = $name_image;
        $gallery->product_id = $pro_id;
        $gallery->save();

        Session::put('message','Thêm mỹ phẩm thành công');

        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('y-m-d');
        $statistical = Statistical::where('order_date', $order_date)->get();
        $spend = $request->product_price_buy*$request->product_qty;
        if($statistical){
			$statistical_count = $statistical->count();
		}else{
			$statistical_count = 0;
		}
        if($statistical_count>0){
            $statistical_update = Statistical::where('order_date',$order_date)->first();
            $statistical_update->spend = $statistical_update->spend + $spend;
            $statistical_update->sales = $statistical_update->sales;
            $statistical_update->profit = $statistical_update->profit;
            $statistical_update->quantity_order = $statistical_update->quantity_order;
            $statistical_update->total_order = $statistical_update->total_order;
            $statistical_update->save();
        }else{
            $statistical_new = new Statistical();
            $statistical_new->order_date = $order_date;
            $statistical_new->sales = 0;
            $statistical_new->profit = 0;
            $statistical_new->quantity_order = 0;
            $statistical_new->total_order = 0;
            $statistical_new->spend = $spend;
            $statistical_new->save();
        }

        return Redirect::to('add-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tb_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Không kích hoạt mỹ phẩm thành công');
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tb_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Kích hoạt mỹ phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tb_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tb_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)
            ->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request, $product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['product_price'] = $request->product_price;
        $data['product_price_buy'] = $request->product_price_buy;
        $data['product_price_real'] = $request->product_price_real;
        $data['product_qty'] = $request->product_qty;
        $data['product_capacity'] = $request->product_capacity;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tb_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật mỹ phẩm thành công');
            return Redirect::to('all-product');
        }
        DB::table('tb_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật mỹ phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tb_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa mỹ phẩm thành công');
        return Redirect::to('all-product');
    }
    // product_detail
    public function product_detail($product_id, Request $request){

        $cate_product = DB::table('tb_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tb_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $detail_product = DB::table('tb_product')
        ->join('tb_category_product','tb_category_product.category_id','=','tb_product.category_id')
        ->join('tb_brand','tb_brand.brand_id','=','tb_product.brand_id')
        ->where('tb_product.product_id',$product_id)->get();
        foreach($detail_product as $key => $val){
            $category_id = $val->category_id;
            $product_id = $val->product_id;
            $product_cate = $val->category_name;
            $cate_slug = $val->slug_category_product;

            $meta_desc = $val->product_desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->product_name;
            $url_canonical = $request->url(); 
        }
        $gallery = Gallery::where('product_id',$product_id)->get();

        // product_views
        $product = Product::where('product_id',$product_id)->first();
        $product->product_views = $product->product_views + 1;
        $product->save();

        $relate_product = DB::table('tb_product')
        ->join('tb_category_product','tb_category_product.category_id','=','tb_product.category_id')
        ->join('tb_brand','tb_brand.brand_id','=','tb_product.brand_id')
        ->where('tb_category_product.category_id',$category_id)->get();

        // $customer_id = Session::get('customer_id');
        $rating_id = Rating::where('product_id', $product_id)->get();
        $rating = Rating::where('product_id', $product_id)->where('customer_id',Session::get('customer_id'))->avg('rating');
        $rating = round($rating);
        return view('pages.product_detail')->with('cate_slug',$cate_slug)->with('product_cate',$product_cate)->with('rating_id',$rating_id)->with('rating',$rating)->with('gallery',$gallery)->with('relate',$relate_product)->with('category',$cate_product)->with('brand',$brand_product)->with('detail_product',$detail_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
