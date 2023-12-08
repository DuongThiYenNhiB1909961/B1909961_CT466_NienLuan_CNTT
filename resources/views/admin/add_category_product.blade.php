@extends('admin_layout')
@section('add_category_product')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục mỹ phẩm
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
                        <form role="form" action="save-category-product" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục</label>
                            <input type="text" data-validation="length" data-validation-length="min3" 
                            data-validation-error-msg="Lam on dien it nhat 3 ky tu" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="slug_category_product" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="7" data-validation="length" data-validation-length="min10" 
                            data-validation-error-msg="Lam on dien it nhat 10 ky tu" class="form-control" name="category_product_desc" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa danh mục</label>
                            <textarea style="resize: none" rows="7" data-validation="length" data-validation-length="min4" 
                            data-validation-error-msg="Lam on dien it nhat 4 ky tu" class="form-control" name="category_product_keywords" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh mỹ phẩm</label>
                            <input type="file" name="category_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh Mỹ phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit"name="add_category_product" class="btn btn-info">Thêm danh mục mỹ phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection