@extends('admin_layout')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật Slider
                        </header>
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<b class="text-danger">'.$message.'</b>';
                                Session::put('message',null);
                            }
                        ?>
                        @foreach($edit_slider as $key => $val)
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-slider/'.$val->slider_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên slide</label>
                                    <input type="text" name="slider_name" value="{{$val->slider_name}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slide">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả slider</label>
                                    <textarea style="resize: none" rows="7" class="form-control" name="slider_desc" id="exampleInputPassword1" >{{$val->slider_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="slider_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn slider</option>
                                            <option value="1">Hiển thị slider</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="update_slider" class="btn btn-info">Cập nhật slider</button>
                                </form>
                            </div>

                        </div>
                        @endforeach
                    </section>

            </div>
@endsection