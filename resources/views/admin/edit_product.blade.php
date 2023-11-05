@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    cập nhật mỹ phẩm
                </header>
                
                <div class="panel-body">
                    <div class="position-center">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<b class="text-danger">'.$message.'</b>';
                        Session::put('message',null);
                    }
                ?>
                        @foreach ($edit_product as $key => $pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mỹ phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khóa mỹ phẩm</label>
                            <input type="text" name="meta_keywords" class="form-control" id="exampleInputEmail1" value="{{$pro->meta_keywords}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá mua mỹ phẩm</label>
                            <input type="text" name="product_price_buy" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price_buy}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán mỹ phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán thực tế</label>
                            <input type="text" name="product_price_real" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price_real}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="number" name="product_qty" min="1" class="form-control" id="exampleInputEmail1" value="{{$pro->product_qty}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đã bán</label>
                            <input type="number" name="product_sold" min="0" class="form-control" id="exampleInputEmail1" value="{{$pro->product_sold}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dung tích</label>
                            <input type="text" name="product_capacity" class="form-control" id="exampleInputEmail1" value="{{$pro->product_capacity}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh mỹ phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh Mỹ phẩm">
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả mỹ phẩm</label>
                            <textarea style="resize: none" rows="7" class="form-control" name="product_desc" id="exampleInputPassword1" >{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung mỹ phẩm</label>
                            <textarea style="resize: none" rows="7" class="form-control" name="product_content" id="exampleInputPassword1">{{$pro->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục mỹ phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                    @if($cate->category_id==$pro->category_id)
                                    <option selected value={{$cate->category_id}}>{{$cate->category_name}}</option>
                                    @else
                                    <option value={{$cate->category_id}}>{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Xuất xứ</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                    @if($brand->brand_id==$pro->brand_id)
                                    <option selected value={{$brand->brand_id}}>{{$brand->brand_name}}</option>
                                    @else
                                    <option value={{$brand->brand_id}}>{{$brand->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit"name="save_product" class="btn btn-info">Cập nhật mỹ phẩm</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
@endsection