<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Session;
use Auth;
session_start();
use Illuminate\Support\Facades\Redirect;

class GalleryController extends Controller
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
    public function add_gallery($product_id){
        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with('pro_id',$pro_id);
    }
    public function select_gellary(Request $request){
       echo $request->pro_id;
        // $product_id = $request->pro_id;
        // $gallery = Gallery::where('product_id',$product_id)->get();
        // $gallery_count = $gallery->count();
        // $output = '';
		// $output .= '<div class="table-responsive">  
		// 	<table class="table table-bordered">
		// 		<thread> 
		// 			<tr>
		// 				<th>Tên thành phố</th>
		// 				<th>Tên quận huyện</th> 
		// 				<th>Tên xã phường</th>
		// 				<th>Phí ship</th>
		// 			</tr>  
		// 		</thread>
		// 		<tbody>
		// 		';
        // $output = '';
        // $output .= '<table class="table table-hover">
        //                 <thead>
        //                     <tr>
        //                         <th>Tên hình ảnh</th>
        //                         <th>Hình ảnh</th>
        //                         <th>Quản lý</th>
        //                     </tr>
        //                 </thead>
        //                 <tbody>
        // ';
        // if($gallery_count>0){
        //     $i=0;
        //     foreach($gallery as $key => $ga){
        //         $i++;
        //         $output.='
        //             <tr>
        //                 <td>'.$ga->gallery_name.'</td>
        //                 <td><img src="'.url('public/uploads/gallery/'.$ga->gallery_image).'" class="img-thumbnail" width="120" height="120"></td>
        //                 <td>
        //                     <button data-gal_id="'.$ga->gallery_id.'" class=""btn btn-xs btn-danger delete-gallery">Xóa</button>
        //                 </td>
        //             </tr>
                
        //         ';
        //     }
        // }else{
        //     $output.='
        //             <tr>
        //                 <td colspan="4">Chưa tồn tại ảnh</td>                       
        //             </tr>
              
        //         ';
        // }
        // $output.='		
		// 		</tbody>
		// 		</table>
		// 		';
        echo $output;
    }
}
