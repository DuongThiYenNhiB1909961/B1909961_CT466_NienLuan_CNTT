<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link rel="icon" href="{{asset('resources/images/logoshop1.png')}}" type="image/x-icon">
        
        <link rel="stylesheet" href="{{asset('resources/css/style.css')}}">
        <link href="{{asset('resources/css/style-responsive.css')}}" rel="stylesheet"/>
        <link href="{{asset('resources/css/font-awesome.css')}}" rel="stylesheet"/>
        <link href="{{asset('resources/css/font-awesome.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('resources/css/animate.css')}}" rel="stylesheet"/>
        <link href="{{asset('resources/css/lightslider.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('resources/css/sweetalert.css')}}"> 
        <link type="text/css" rel="stylesheet" href="{{asset('resources/css/lightgallery.min.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('resources/css/prettify.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
        <!-- Fonts -->
        <link href="{{asset('https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap')}}" rel="stylesheet">
        <!-- Styles -->

        <style>
            .google{
                font-size: 150%
            }
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
            .logo{
                display: flex;
                align-items: center;
                justify-content: center;
            }
        
        </style>
    </head>
    <body class="antialiased container">
        
        <div class=" shadow relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="row logo">
                <div class="col-sm-1"><img src="resources/images/logoshop1.png" height="70px" width="70px"></div>
                <div class="col-sm-4 text-danger" style="margin-top: 20px; padding-left:10px; font-family: MV boli;"><b>THIÊN ĐƯỜNG LÀM ĐẸP</b></div>
                
                
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
                <form action="dashboard"  method="post" class="pt-2">
                    <center><h4><b>Đăng nhập Admin</b></h4><hr></center>
                    {{csrf_field()}}
                    @foreach($errors->all() as $val)
                    {{$val}}
                    @endforeach
                    <div class="form-group row" style="margin-left: 186px">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" name="admin_email" class="form-control" id="inputEmail4" placeholder="Vui long dien email" required>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-left: 186px">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" name="admin_password" class="form-control" id="inputPassword4" placeholder="*********" required>
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
                    
                    </form>
                    <center class="login_gg"><a  href="login-google"><img src="resources/images/gg.png" width="45px" height="45px"> <b>Đăng nhập với Google</b></a></center>
                    
                </div>
            </div>
        </div>   
          
        
    </body>
</html>