@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <center><h4><b class="text-info">Cập nhật thông tin cá nhân</b></h4><hr></center>
                
                <div class="panel-body">
                    @foreach($edit_user as $key => $edit_value)
                    <div class="position-center">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<b class="text-danger">'.$message.'</b>';
                        Session::put('message',null);
                    }
                ?>
                        <form role="form" action="{{URL::to('/update-user/'.$edit_value->customer_id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group row" style="margin-left: 186px">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Tên Thành Viên</label>
                                <div class="col-sm-7">
                                  <input type="name" value="{{$edit_value->customer_name}}" name="customer_name" class="customer_name shadow form-control" id="inputName" placeholder="Họ tên khách hàng" required>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-left: 186px">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-7">
                                  <input type="email" value="{{$edit_value->customer_email}}" name="customer_email" class="customer_email shadow form-control" id="inputName" placeholder="Email đăng nhập" required>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-left: 186px">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Địa Chỉ Thành Viên</label>
                                <div class="col-sm-7">
                                  <input type="text" value="{{$edit_value->customer_address}}" name="customer_address" class="customer_address shadow form-control" id="inputName" placeholder="Địa chỉ khách hàng" required>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-left: 186px">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Mật khẩu Mới</label>
                                <div class="col-sm-7">
                                  <input type="password" name="customer_password" class="customer_password shadow form-control" id="inputName" placeholder="******" required>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-left: 186px">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Số điện thoại</label>
                                <div class="col-sm-7">
                                  <input type="text" value="{{$edit_value->customer_phone}}" name="customer_phone" class="customer_phone shadow form-control" id="inputName" placeholder="0978978789" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                                </div>
                            </div>
                        <button type="submit" name="update_user" class="btn btn-info" style="margin-left: 39%">Cập nhật thông tin</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
@endsection