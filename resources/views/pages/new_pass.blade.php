@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">Đăng nhập</li>
    </ol>
  </nav>
  <style>
    
    .signin{
        margin-left: 40%;
        margin-right: 28%;
    }

</style>
<div class=" shadow relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="row">
        <div class="col-sm-1"><img src="resources/images/logoshop1.png" height="100px" width="100px"></div>
        <div class="col-sm-4 text-danger" style="margin-top: 36px; padding-left:24px; font-family: MV boli;"><b>THIÊN ĐƯỜNG LÀM ĐẸP</b></div>
        
        
    </div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <?php
                    $message = Session::get('message');
                    $error = Session::get('error');
                    if($message){
                        echo '<b class="text-danger">'.$message.'</b>';
                        Session::put('message',null);
                    }else{
                        echo '<b class="text-danger">'.$error.'</b>';
                        Session::put('error',null);
                    }
                ?>
        @php
          $token = $_GET['token'];
          $email = $_GET['email'];  
        @endphp
        <form action="{{URL::to('reset-new-pass')}}" method="post" class="pt-2">
            <center><h4><b>Điền mật khẩu mới</b></h4><hr></center>
            {{csrf_field()}}
            <input type="hidden"  name="email" value="{{$email}}">
            <input type="hidden" name="token" value="{{$token}}">
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-5">
                  <input type="text" name="password_account" class="shadow form-control" id="inputName" placeholder="Nhập mật khẩu mới" required>
                </div>
            </div>
            <p class="signin"><input type="submit" class="btn btn-info" value="Gửi" name=""></p>
            
    </div>
</div>
@endsection