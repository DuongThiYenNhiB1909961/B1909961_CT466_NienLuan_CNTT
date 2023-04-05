@extends('admin_layout')
@section('edit_brand_product')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật xuất xứ của mỹ phẩm
                </header>
                
                <div class="panel-body">
                    @foreach($edit_brand_product as $key => $edit_value)
                    <div class="position-center">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<b class="text-danger">'.$message.'</b>';
                        Session::put('message',null);
                    }
                ?>
                        <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->id)}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên xuất xứ</label>
                            <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả xuất xứ</label>
                            <textarea style="resize: none" rows="7" class="form-control" name="brand_product_desc" id="exampleInputPassword1">
                            {{$edit_value->brand_desc}}
                            </textarea>
                        </div>
                        
                        
                        <button type="submit"name="update_brand_product" class="btn btn-info">Cập nhật xuất xứ mỹ phẩm</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
@endsection