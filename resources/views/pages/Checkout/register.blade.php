@extends('layout')
@section('register')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">Đăng ký</li>
    </ol>
  </nav>
<div class="shadow p-3">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <center><h4><b>Đăng ký tài khoản</b></h4><hr></center>
        <form action="{{URL::to('add-customer')}}" class="pt-2" method="POST">
            {{csrf_field()}}
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Tên khách hàng</label>
                <div class="col-sm-7">
                  <input type="name" name="customer_name" class="customer_name shadow form-control" id="inputName" placeholder="Họ tên khách hàng" required>
                </div>
            </div>
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                  <input type="email" name="customer_email" class="customer_email shadow form-control" id="inputName" placeholder="Email đăng nhập" required>
                </div>
            </div>
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Địa chỉ khách hàng</label>
                <div class="col-sm-7">
                  <input type="text" name="customer_address" class="customer_address shadow form-control" id="inputName" placeholder="Địa chỉ khách hàng" required>
                </div>
            </div>
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-7">
                  <input type="password" name="customer_password" class="customer_password shadow form-control" id="inputName" placeholder="******" required>
                </div>
            </div>
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Số điện thoại</label>
                <div class="col-sm-7">
                  <input type="text" name="customer_phone" class="customer_phone shadow form-control" id="inputName" placeholder="0978978789" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                </div>
            </div>
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-7">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        Check me out
                        </label>
                    </div>
                    <button type="submit" class="btn btn-danger">Register</button>
                </div>
            </div>

            
        </form>
    </div>
</div>
@endsection