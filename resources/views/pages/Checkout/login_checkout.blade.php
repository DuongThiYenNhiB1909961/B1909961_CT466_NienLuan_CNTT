@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">Đăng nhập</li>
    </ol>
  </nav>
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
            <div class="form-group row" style="margin-left: 186px">
                <label for="colFormLabel" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        Check me out
                        </label>
                    </div>
                </div>
            </div>

            {{-- <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <br/>
                @if($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" style='display:block'>
                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                </span>
                @endif --}}
        <div style="margin-left: 39%">
            <button type="submit" class="btn btn-danger">Login</button>
            <b><p>Nếu bạn chưa có tài khoản hãy</p><a class="nav-link text-danger" href="register">Register</a></b>
            
            </form>
            <a href="{{url::to('/login-customer-google')}}"><b>Login Google</b></a>
            <a href="{{url::to('/login-facebook-customer')}}"><b>Login Facebook</b></a>
        </div>
    </div>
</div>
{{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
@endsection