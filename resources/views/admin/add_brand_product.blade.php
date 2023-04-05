@extends('admin_layout')
@section('add_brand_product')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm xuất xứ mỹ phẩm
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
                        <form role="form" action="save-brand-product" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nơi Xuất Xứ</label>
                            <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize: none" rows="7" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit"name="save_brand_product" class="btn btn-info">Thêm Xuất Xứ</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection