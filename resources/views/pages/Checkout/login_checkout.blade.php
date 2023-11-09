@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">Đăng nhập</li>
    </ol>
  </nav>
<div class=" shadow relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <img src="https://printgo.vn/uploads/media/772948/thiet-ke-logo-my-pham-10_1584438206.jpg" class="h-30 w-auto text-gray-700 sm:h-20">
            <i class="justify-center pt-4 font-semibold text-danger" ><b>THIÊN ĐƯỜNG LÀM ĐẸP</b></i>
        </div>
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
            <h3>Đăng nhập tài khoản</h3>
            {{csrf_field()}}
            @foreach($errors->all() as $val)
            {{$val}}
            @endforeach
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input name="customer_email" type="email" class="form-control" id="inputEmail4" required>
            </div>
            <div class="form-group">
                <label for="inputPassword4">Password</label>
                <input name="customer_password" type="password" class="form-control" id="inputPassword4" required>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                    Check me out
                    </label>
                </div>
            </div>

            {{-- <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <br/>
                @if($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" style='display:block'>
                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                </span>
                @endif --}}

            <button type="submit" class="btn btn-danger">Login</button>
            <b><p>Nếu bạn chưa có tài khoản hãy</p><a class="nav-link text-danger" href="register">Register</a></b>
            
        </form>
        {{-- <a href="{{url::to('/login-customer-google')}}"><b>Login Google</b></a>
        <a href="{{url::to('/login-facebook-customer')}}"><b>Login Facebook</b></a> --}}
    </div>
</div>
{{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
@endsection