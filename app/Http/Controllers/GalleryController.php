<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

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
    public function insert_gallery(Request $request, $product_id){
        $get_image = $request->file('file');
        if($get_image){
            foreach($get_image as $img){
                $get_name_image=$img->getClientOriginalName();
                $name_image=current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$img->getClientOriginalExtension();
                $img->move('public/uploads/gallery',$new_image);
                $gallery = new Gallery();
                $gallery->gallery_name = $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id = $product_id;
                $gallery->save(); 
            }
        }
        Session::put('message','Thêm thành công');
        return redirect()->back();
    }
    public function select_gallery(Request $request){
        $pro_id = $request->pro_id;
        $gallery = Gallery::where('product_id',$pro_id)->get();
        $gallery_count = $gallery->count();
        $output = '';
        $output .= '
            
            <div class="table-responsive">  
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên hình ảnh</th>
                            <th>Hình ảnh</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
				<tbody>
                
				';
        
        if($gallery_count>0){
            $i=0;
            foreach($gallery as $key => $ga){
                $i++;
                $output.='
                <tbody>
                    <tr>
                        <td>'.$i.'</td>
                        <td contenteditable class="edit_name_gal" data-gal_id="'.$ga->gallery_id.'">'.$ga->gallery_name.'</td>
                        <td>
                            <img src="'.asset('public/uploads/gallery/'.$ga->gallery_image).'" class="img-thumbnail" width="120" height="120">
                            <input type="file" class="file_img" style="width:40%" data-gal_id="'.$ga->gallery_id.'" id="file-'.$ga->gallery_id.'"
                            name="file" accept="image/*" >
                        </td>
                        <td>
                            <button type="button" data-gal_id="'.$ga->gallery_id.'" class="btn btn-danger btn-sm delete-gallery">xóa</button>
                        </td>
                    </tr>
                
                ';
            }
        }else{
            $output.='
                    <tr>
                        <td colspan="4" class="text-center" >Chưa tồn tại ảnh</td>                       
                    </tr>
              
                ';
        }
        $output.='	
                
				</tbody>
                </table>
                </div>
				';
        echo $output;
    }
    public function edit_name_gal(Request $request){
        $gallery_id = $request->gal_id;
        $gallery_name = $request->gal_text;
        $gallery = Gallery::find($gallery_id);
		$gallery->gallery_name = $gallery_name;
		$gallery->save();
    }
    public function delete_gallery(Request $request){
        $gallery_id = $request->gal_id;
        $gallery = Gallery::find($gallery_id);
		unlink('public/uploads/gallery/'.$gallery->gallery_image);
        $gallery->delete();
    }
    public function update_gallery(Request $request){
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
        if($get_image){
           
                $get_name_image=$get_image->getClientOriginalName();
                $name_image=current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/gallery',$new_image);

                $gallery = Gallery::find($gal_id);
                unlink('public/uploads/gallery/'.$gallery->gallery_image);
                $gallery->gallery_image = $new_image;
                $gallery->save(); 
           
        }
    }
}
