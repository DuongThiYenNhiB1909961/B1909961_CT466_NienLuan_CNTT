@extends('admin_layout')
@section('add_product')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mỹ phẩm
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
                        <form role="form" action="save-product" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mỹ phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Mỹ Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá mỹ phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá Mỹ Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh mỹ phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh Mỹ phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả mỹ phẩm</label>
                            <textarea style="resize: none" rows="7" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung mỹ phẩm</label>
                            <textarea style="resize: none" rows="7" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội dung danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục mỹ phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                    <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Xuất Xứ</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                        
                        <button type="submit"name="save_product" class="btn btn-info">Thêm mỹ phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection