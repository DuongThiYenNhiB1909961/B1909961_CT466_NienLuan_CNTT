@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">Đăng nhập</li>
    </ol>
  </nav>
  <style>
    
    .login_gg{
        border: 1px solid #000;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50%;
        margin-right: 46%;
        margin-top: 5px;
    }
    .signin{
        border: 1px solid crimson;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: crimson;
        margin-left: 39%;
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
        <form action="{{URL::to('login')}}" method="get" class="pt-2">
            <center><h4><b>Đăng nhập tài khoản</b></h4><hr></center>
            {{csrf_field()}}
            @foreach($errors->all() as $val)
            {{$val}}
            @endforeach
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-5">
                  <input type="email" name="customer_email" class="customer_email shadow form-control" id="inputName" placeholder="Email đăng nhập" required>
                </div>
            </div>
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-5">
                  <input type="password" name="customer_password" class="customer_password shadow form-control" id="inputName" placeholder="*******" required>
                </div>
            </div>
            <div class="form-group row" style="margin-left: 190px">
                <label for="colFormLabel" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-5">
                    {{-- <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Nhớ mật khẩu
                    </label> --}}
                    <a href="{{asset('/quen-mk')}}" style="font-size: 16px;">Quên mật khẩu</a>
                </div>
            </div>
            
            <p class="signin"><input type="submit" class="btn text-white" value="Đăng nhập" name="login"></p>
            {{-- <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <br/>
                @if($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" style='display:block'>
                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                </span>
                @endif --}}
        <div style="margin-left: 39%">
            
            <b><p>Nếu bạn chưa có tài khoản hãy</p><a class="nav-link text-danger" href="register">Register</a></b>
            
            </form>
            <center class="login_gg"><a  href="login-google"><img src="resources/images/gg.png" width="45px" height="45px"> <b>Đăng nhập với Google</b></a></center>
            
            {{-- <a href="{{url::to('/login-facebook-customer')}}"><b>Login Facebook</b></a> --}}
        </div>
    </div>
</div>
{{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
@endsection