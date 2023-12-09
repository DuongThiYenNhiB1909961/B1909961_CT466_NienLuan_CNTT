<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{$meta_desc}}" >
        <meta name="keywords" content="{{$meta_keywords}}" >
        <meta name="robots" content="INDEX,FOLLOW"/>
        <link rel="canonical" href="{{$url_canonical}}">
        <meta name="author" content="" >
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <title>{{$meta_title}}</title>
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
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
            .dropdown-menu.extended {
                max-width:320px !important;
                min-width:160px !important;
                top:42px;
                width:300px !important;
                padding:0 10px;
                box-shadow:0 0px 5px rgba(0,0,0,0.1) !important;
                border-radius:5px;
                -webkit-border-radius:5px;
                background:#fff;
                border:none;
                left:-10px;
            }
            .notify-row .notification span.label {
                display:inline-block;
                height:21px;
                padding:5px;
                width:22px;
                font-size:12px;
                margin-right:10px;
            }
            .dropdown-menu.extended .alert-icon,.noti-info {
                float:left;
            }
            .noti-info {
                padding-left:10px;
                padding-top:6px;
                color:#414147;
            }
            .dropdown-menu.extended .alert {
                margin-bottom:10px;
            }
            .dropdown-menu.extended .alert-icon {
                border-radius:100%;
                display:inline-block;
                height:35px;
                width:35px;
            }
            .dropdown-menu.extended .alert-icon i {
                font-size:16px;
                width:35px;
                line-height:35px;
                height:35px;
            }
            .dropdown-menu.extended.inbox li a,.dropdown-menu.extended.tasks-bar li a {
                background:#f1f2f7;
                border-radius:5px;
                -webkit-border-radius:5px;
                padding:10px;
                margin-bottom:10px;
                float:left;
                width:100%;
            }
            .dropdown-menu.extended li p {
                margin:0;
                padding:10px 0;
                border-radius:0px;
                -webkit-border-radius:0px;
            }
            .dropdown-menu.extended li a {
                font-size:12px;
                list-style:none;
            }
            .dropdown-menu.extended.logout {
                padding:10px;
            }
            .dropdown-menu.extended.logout li a {
                padding:10px;
            }
            .dropdown-menu.extended li a:hover {
                color:#32323a;
            }
            .dropdown-menu.tasks-bar .task-info .desc {
                font-size:13px;
                font-weight:normal;
                float:left;
                width:80%;
            }
            .dropdown-menu.tasks-bar .task-info .desc h5 {
                color:#32323a;
                text-transform:uppercase;
                font-size:12px;
                font-weight:600;
                margin-bottom:5px;
                margin-top:0;
            }
            .dropdown-menu.tasks-bar .task-info .desc p {
                padding-top:0;
                color:#8f8f9b;
                font-weight:300;
            }
            .dropdown-menu.tasks-bar .task-info .percent {
                width:20%;
                float:right;
                font-size:13px;
                font-weight:600;
                padding-left:10px;
                line-height:normal;
            }
            .dropdown-menu.tasks-bar .progress {
                background:#fff;
            }
            .dropdown-menu.extended .progress {
                margin-bottom:0 !important;
                height:10px;
            }
            .dropdown-menu.inbox li a .photo img {
                border-radius:2px 2px 2px 2px;
                -webkit-border-radius:2px 2px 2px 2px;
                float:left;
                height:40px;
                margin-right:10px;
                width:40px;
            }
            .dropdown-menu.inbox li a .subject {
                display:block;
            }
            .dropdown-menu.inbox li a .subject .from {
                font-size:12px;
                font-weight:600;
            }
            .dropdown-menu.inbox li a .subject .time {
                font-size:11px;
                font-style:italic;
                font-weight:bold;
                position:absolute;
                right:20px;
            }
            .dropdown-menu.inbox li a .message {
                display:block !important;
                font-size:11px;
            }
            .top-nav {
                margin-top:20px;
            }
            .top-nav img {
                border-radius:50%;
                -webkit-border-radius:50%;
                width:33px;
            }
            .top-nav .icon-user i {
                height: 33px;
                width:33px;
                line-height: 33px;
                display: inline-block;
                font-size: 1.7em;
                padding-left: 10px;
            }
            .top-nav .icon-user .username {
                color: #555555;
                font-size: 13px;
                position: relative;
                top: -5px;
            }
            .top-nav .icon-user .caret {
                position: relative;
                top: -4px;
            }
            .top-nav ul.top-menu>li .dropdown-menu.logout {
                width:170px !important;
            }
            .top-nav li.dropdown .dropdown-menu {
                float:right;
                right:0;
                left:auto;
            }
            .dropdown-menu.extended.logout>li {
                float:left;
                width:100%;
            }
            .log-arrow-up {
                background:url("../images/top-arrow.png") no-repeat;
                width:18px;
                height:10px;
                margin-top:-20px;
                float:right;
                margin-right:15px;
            }
            .dropdown-menu.extended.logout>li>a {
                border-bottom:none !important;
            }
            .full-width .dropdown-menu.extended.logout>li>a:hover {
                background:#F1F2F7 !important;
                color:#32323a !important;
            }
            .dropdown-menu.extended.logout>li>a:hover {
                background:#F1F2F7 !important;
                border-radius:5px;
            }
            .dropdown-menu.extended.logout>li>a:hover i {
                color:#ffa2a2;
            }
            .dropdown-menu.extended.logout>li>a i {
                font-size:17px;
            }
            .dropdown-menu.extended.logout>li>a>i {
                padding-right:10px;
            }
            .top-nav .username {
                font-size:13px;
                color:#fff;
            }
            .top-nav ul.top-menu>li>a {
                border-radius: 100px;
                -webkit-border-radius: 100px;
                padding: 0px;
                background: none;
                margin-right: 0;
                border: 1px solid #8b5c7e;
                background: rgb(236, 130, 148);
            }
            .top-nav ul.top-menu>li.language>a {
                margin-top:-2px;
                padding:4px 12px;
                line-height:20px;
            }
            .top-nav ul.top-menu>li.language>a img {
                border-radius:0;
                -webkit-border-radius:0;
                width:18px;
            }
            .top-nav ul.top-menu>li.language ul.dropdown-menu li img {
                border-radius:0;
                -webkit-border-radius:0;
                width:18px;
            }
            .top-nav ul.top-menu>li {
                margin-left:10px;
            }
            .top-nav ul.top-menu>li>a:hover,.top-nav ul.top-menu>li>a:focus {
                border:1px solid #c8fa9f;
                background:#78ca9d !important;
                border-radius:100px;
                -webkit-border-radius:100px;
            }
            .top-nav .dropdown-menu.extended.logout {
                top:50px;
            }
        </style>
    </head>
    <body class="antialiased">
        
        <header class="row header">
            <nav class="banner_header" >
                <div class="text-white" style="font-size: 12px">TDMP Cosmetis - Shop Mỹ Phẩm, Son Môi, Nước Hoa Chính Hãng &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-envelope text-white" aria-hidden="true"> thienduonglamdep2023@gmail.com </i>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <i class="fa fa-phone text-white" aria-hidden="true">    0969787889</i></div>
                
            </nav>
            <br>
                <nav class="banner navbar navbar-expand-lg navbar-light col-sm-6 ">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-5 justify-content-center" style="margin-left: 5%">
                        <li class="nav-item">
                            <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('index')}}"><i class="fa fa-home text-warning" aria-hidden="true"></i><b>Home </b></a></div>
                        </li>
                        <li class="nav-item ml-2">
                            <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('introduce')}}"><i class="fa fa-book text-warning" aria-hidden="true"></i><b>Tin tức</b> </a></div>
                        </li>
                        <li class="nav-item dropdown ml-2">
                            <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('product')}}"><i class="fa fa-heart text-warning" aria-hidden="true"></i><b>Sản phẩm</b></a></div>
                        </li>
                        <li class="nav-item ml-2">
                            <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('contact')}}"><i class="fa fa-volume-control-phone text-warning" aria-hidden="true"></i><b>Liên hệ</b></a></div>
                        </li>
                    </ul>
                    </div>
                    
                </nav>
            
                <nav class="banner col-sm-6" style="float: right">
                    <div class="shop-menu pull-right">
                        <ul class="nav justify-content-center">
                        
                            
                            <li class="nav-item cart-hover">
                                <div class=" text-lg font-semibold"><a class="nav-link  text-danger" title="Giỏ hàng" href="{{asset('/show-cart-ajax')}}">
                                <i class="fa fa-cart-plus text-warning" aria-hidden="true"></i>
                                <span id="show-cart"></span>
                                    <div class="clearfix"></div>
                                    <span class="hover-giohang"></span>
                                    
                                </a></div>
                            </li>    
                        
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id != NULL)
                                {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link  text-danger" title="Đăng xuất" href="{{asset('/logout')}}"><i class="fa fa-sign-out text-warning" aria-hidden="true"></i></a>
                                {{-- <img width="15%" src="{{Session::get('customer_picture')}}"><b class="text-danger">{{Session::get('customer_name')}}</b>  --}}
                                <div class="top-nav clearfix">
                                    <!--search & user info start-->
                                    <ul class="nav pull-right top-menu">
                                        
                                        <!-- user login dropdown start-->
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <img alt="" src="{{asset('resources/images/4.png')}}">
                                                <span class="username">
                                                    <?php
                                                    if(Session::get('login_normal')){
                                                        $name = Session::get('customer_name');
                                                    }else {
                                                        $name = Session::get('customer_name');
                                                    }
                                                        
                                                        if($name){
                                                            echo $name ;
                                                        }
                                                    ?>
                                                </span>
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu extended logout">
                                                <li><a href="{{asset('/edit-user/'.$customer_id)}}"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                                <li><a href="{{asset('/history')}}"><i class="fa fa-history" aria-hidden="true"></i>Lịch sử</a></li>
                                            </ul>
                                            
                                        </li>
                                        <!-- user login dropdown end -->
                                    
                                    </ul>
                                    <!--search & user info end-->
                                </div>
                            </li>
                            <?php
                                }else{
                            ?>
                            <li class="nav-item">
                                <div class=" text-lg font-semibold"><a class="nav-link  text-danger" title="Đăng nhập" href="{{asset('/login-checkout')}}"><i class="fa fa-sign-in text-warning" aria-hidden="true"></i></a></div>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                        
                    </div>
                </nav><br>
            {{-- </div> --}}
            <div class="sea">
                    <form action="{{asset('/search')}}" method="POST">
                        {{csrf_field()}}
                            <div class="input-group" style="margin-top: 13px">
                                <input type="text" id="keywords" name="keywords_submit" class="form-control" placeholder="Bạn cần tìm mỹ phẩm?" style="border: 2px solid #000">
                                <div id="search-ajax"></div>
                                <span class="input-group-btn">
                                <input class="btn btn-sm btn-danger list-inline-item" type="submit" value="Tìm!" style="margin-top: 4px">
                                </span>
                            </div>
                            
                    </form>
            </div>    
                
            
        </header>
        <!-- Example single danger button -->
        @yield('home')
        <div class="container yield">
            @yield('content')
            
            @yield('introduce')
            @yield('login')
            @yield('register')
            @yield('product')
        </div>
    
        
        <footer class="container mt-2 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
                    <div class="rounded">
                        <div class="row">
                            <div class="col text-center m-2">
                                <div style="font-size: 2em" class="font-semibold"><b>CONTACT US</b></div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="row ">
                                <div class="col-sm">
                                    <i class="text-danger"><b>Online</b></i>
                                    <p>Email: thienduonglamdep2023@gmail.com</p>
                                    <p>Facebook: ThienDuongLamDep2023</p>
                                    <p>Zalo: 0969787889-ThienDuongLamDep2023</p>
                                    <i class="text-danger"><b>Address</b></i>
                                    <p>Shop 1: Số 123, đường Nguyễn Văn Cừ, phường An Khánh, quận Ninh Kiều, tp Cần Thơ</p>
                                </div>
                                
                                <div class="col-sm">
                                    {{-- <i class="text-danger"><b>Map</b></i> --}}
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.841454377069!2d105.76804037387961!3d10.02993897252123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1702018489999!5m2!1svi!2s"
                                     width="600" height="300" style="border:0;" ></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0 pt-2">
                            <i>Mọi ý kiến góp ý xin gửi về theo địa chỉ email thienduonglamdep2023@gmail.com</i>
                        </div>
                    </div>
                </div>
            </div>  
            
        </footer>
        
        {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
        {{-- <script src="{{asset('resources/js/sweetalert.min.js')}}"></script> --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script src="{{asset('resources/js/lightslider.js')}}"></script>
        <script src="{{asset('resources/js/lightgallery-all.min.js')}}"></script>
        <script src="{{asset('resources/js/prettify.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="{{asset('resources/js/datatables.min.js')}}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script type="text/javascript">
            let table = new DataTable('#myTable');
        </script>
        <script>
            product_new();
            function product_new(id = ''){
                $.ajax({
                    url: '{{url('/home-product')}}',
                    method: 'POST',
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{id:id},
                    success:function(data){
                        $('#home_product').append(data);
                    } 
                });
            }
        </script>
        <script>
            show_product();
            function show_product(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/load-more')}}',
                    method: 'POST',
                    // headers:{
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    data:{_token:_token},
                    success:function(data){
                        // $('#load_more_button').remove();
                        $('#all_product').html(data);
                    } 
                });
            }
            // $(document).on('click','#load_more_button',function(){
            //     var id = $(this).data('id');
            //     load_more_product(id);
            // })
        </script>
        {{-- <div id="paypal-button"></div> --}}
        {{-- Paypal --}}
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
            var toUSD = document.getElementById("toUSD").value;
            paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
              sandbox: 'AfSelfBuM4dxzbV1JYxZFyS2CJO1BX1M3Iwl5cz6rFNq43DxYqL3zn_EPEIqNCqEJH8j7Ht1khRXUsVD',
              production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
              size: 'small',
              color: 'gold',
              shape: 'pill',
            },
        
            // Enable Pay Now checkout flow (optional)
            commit: true,
        
            // Set up a payment
            payment: function(data, actions) {
              return actions.payment.create({
                transactions: [{
                  amount: {
                    total: `${toUSD}`,
                    currency: 'USD'
                  }
                }]
              });
            },
            
            // Execute the payment
            onAuthorize: function(data, actions) {
              return actions.payment.execute().then(function() {
                
                // Show a confirmation message to the buyer
                // window.alert('Cảm ơn bạn đã tin tưởng mua hàng của shop!');
                window.location.replace('http://nhiduongcosmetic.com/My_Project_NL/history?thanhtoan=paypal');
              });
            },
            // onCancle:function(data){
            //     window.location.replace('http://nhiduongcosmetic.com/My_Project_NL/history');
            // }
          
          }, '#paypal-button');
          
        </script>
        {{-- //Paypal --}}
        <!-- Messenger Plugin chat Code -->
        <div id="fb-root"></div>

        <!-- Your Plugin chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "116662988206640");
        chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v18.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <script>
            $(document).ready(function(){
                $( "#slider-range" ).slider({
                    orientation: "horizontal",
                    range: true,

                    min: {{$min_price}},
                    max: {{$max_add}},
                    values: [ {{$min_price}}, {{$max_price}} ],
                    step: 10000,
                    slide: function( event, ui ){
                        $( "#amount" ).val( "vnđ " + ui.values[ 0 ] + " - vnđ " + ui.values[ 1 ] );
                        $( "#start_price" ).val(ui.values[ 0 ]);
                        $( "#end_price" ).val(ui.values[ 1 ] );
                    }
                });
                $( "#amount" ).val( "vnđ " + $( "#slider-range" ).slider( "values", 0 ) +
                    " - vnđ " + $( "#slider-range" ).slider( "values", 1 ) );
            });
        </script>
        <script>
            function Huydon(id){
                var order_code = id;
                var lydo = $('.lydo').val();
                var _token = $('input[name="_token"]').val();
                if(lydo==''){
                    alert('Vui lòng chọn vào lý do hủy đơn');
                }else{
                    $.ajax({
                    url: '{{url('/huydon')}}',
                        method: 'POST',
                        data:{
                            order_code:order_code,
                            lydo:lydo,
                            _token:_token},
                        success:function(data){
                            swal("Đã hủy đơn hàng của bạn");
                        }
                }); 
                window.setTimeout(function(){ 
                    location.reload();   
                } ,3000);
                } 
            }
        </script>
        <script>
            $(document).ready(function() {
                $('#imageGallery').lightSlider({
                    gallery:true,
                    item:1,
                    loop:true,
                    thumbItem:3,
                    slideMargin:0,
                    enableDrag: false,
                    currentPagerPosition:'center',
                    onSliderLoad: function(el) {
                        el.lightGallery({
                            selector: '#imageGallery .lslide'
                        });
                    }   
                });  
            });
        </script>
        <script>
            $(document).ready(function(){
                $('#sort').on('change',function(){
                    var url = $(this).val();
                    // alert (url);
                    if(url){
                        window.location = url;
                    }else{
                        return false;
                    }
                    
                });
            });
        </script>
        <script>
            function remove_background(product_id){
                for(var count = 1; count <= 5; count++){
                    $('#'+product_id+'-' +count).css('color','#ccc');
                }
            }
            $(document).on('mouseenter','.rating',function(){
                var index = $(this).data("index");
                var product_id = $(this).data('product_id');
                remove_background(product_id);
                for(var count = 1; count <= index; count++){
                    $('#'+product_id+'-' +count).css('color','#ffcc00');
                }
            });
            $(document).on('mouseleave','.rating',function(){
                var index = $(this).data("index");
                var product_id = $(this).data('product_id');
                var rating = $(this).data("rating");
                remove_background(product_id);
                for(var count = 1; count <= rating; count++){
                    $('#'+product_id+'-' +count).css('color','#ffcc00');
                }
            });
            $(document).on('click','.rating',function(){
                var index = $(this).data("index");
                var product_id = $(this).data('product_id');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                        url: '{{url('/add-rating')}}',
                        method: 'POST',
                        data:{
                            index:index,
                            product_id:product_id,
                            _token:_token},
                        success:function(data){
                            if(data == 'done'){
                                swal("Good job!", "Bạn đã đánh giá "+index+" trên 5 sao. Hãy viết bình luận của bạn về sản phẩm", "success");
                                
                            }
                            else{
                                alert("Lỗi đánh giá");
                            }
                        } 

                    }); 
            });
        </script>
        <script>
            $(document).ready(function(){
                load_comment()
                
                function load_comment(){
                    var product_id = $('.comment_product_id').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/load-cmt')}}',
                        method: 'POST',
                        data:{
                            product_id:product_id,
                            _token:_token},
                        success:function(data){
                            
                            $('#load_comment').html(data);
                        } 

                    }); 
                }
                $('.send_cmt').click(function(){
                    
                    var product_id = $('.comment_product_id').val();
                    var comment_name = $('.comment_name').val();
                    var comment_content = $('.comment_content').val();
                    var _token = $('input[name="_token"]').val();
                    
                    $.ajax({
                        url: '{{url('/send-cmt')}}',
                        method: 'POST',
                        data:{
                            product_id:product_id,
                            comment_name:comment_name,
                            comment_content:comment_content,
                            _token:_token},
                        success:function(data){
                            
                            $('#status').html('<span class="text text-success">Chờ duyệt bình luận</span>');
                            load_comment();
                            $('#status').fadeOut(5000);
                            $('.comment_content').val('');
                            swal("Good job!", "Cảm ơn bạn đã bình luận", "success");
                        } 

                    }); 
                })
            })
        </script>
        <script>
            $('#keywords').keyup(function(){
                var query = $(this).val();
                if(query != ''){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/auto-ajax')}}',
                        method: 'POST',
                        data:{
                            query:query,
                            _token:_token},
                        success:function(data){
                            $('#search-ajax').fadeIn();
                            $('#search-ajax').html(data);
                        } 

                    });
                }else{
                    $('#search-ajax').fadeOut();
                }
            });
            $(document).on('click','li',function(){
                $('#keywords').val($(this).text());
                $('#search-ajax').fadeOut();
            })
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
            show_cart_number();
            hover_cart();
            function hover_cart(){
                $.ajax({
                    url: '{{url('/hover-cart')}}',
                    method: 'GET',
                    success:function(data){
                        $('.hover-giohang').html(data);
                    } 
                });
            }
            function show_cart_number(){
                $.ajax({
                    url: '{{url('/show-cart-number')}}',
                    method: 'GET',
                    success:function(data){
                        $('#show-cart').html(data);
                    } 
                });
            }
            $('.add-to-cart').click(function(){
                var id = $(this).data('id');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_qty = $('.cart_product_pty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty) < 0 || parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
                    alert('Số lượng thêm phải lớn hơn 0 hoặc số lượng sản phẩm nhỏ hơn ' + cart_product_quantity);
                }else
                    {
                        $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{
                            cart_product_id:cart_product_id,
                            cart_product_name:cart_product_name,
                            cart_product_image:cart_product_image,
                            cart_product_price:cart_product_price,
                            cart_product_quantity:cart_product_quantity,
                            cart_product_qty:cart_product_qty,
                            _token:_token},
                        success:function(data){
                            swal("Good job!", "Đã thêm sản phẩm vào giỏ hàng", "success");
                            show_cart_number();
                            hover_cart();
                        } 
                        });
                    }
                
            });
        });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                
                if(action=='city'){
                    result = 'district';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery-checkout')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                       $('#'+result).html(data);     
                    }
                });
            }); 
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.fee_feeship').on('click',function(){
                    var matp = $('.city').val();
                    var maqh = $('.district').val();
                    var xaid = $('.wards').val();
                    var payment_select = $('.payment_select').val();
                    var shipping_name = $('.shipping_name').val();
                    var shipping_email = $('.shipping_email').val();
                    var shipping_address = $('.shipping_address').val();
                    var shipping_phone = $('.shipping_phone').val();
                    var shipping_note = $('.shipping_note').val();
                    var _token = $('input[name="_token"]').val();
                    if(matp == '' || maqh == '' || xaid == ''){
                        alert('Vui lòng chọn đầy đủ địa chỉ cần vận chuyển');
                    }else{
                    $.ajax({
                        url : '{{url('/fee-feeship')}}',
                        method: 'POST',
                        data:{matp:matp,maqh:maqh,xaid:xaid,payment_select:payment_select,shipping_name:shipping_name,shipping_email:shipping_email,
                            shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_note:shipping_note,_token:_token},
                        success:function(data){
                            location.reload();      
                        }
                    });
                }
                }); 
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.vnpay').click(function(){
                    var total_vnpay = $('.total_vnpay').val();
                    var order_coupon = $('.order_coupon').val();
                    var order_fee = $('.order_fee').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                            url: '{{url('/vnpay-checkout')}}',
                            method: 'POST',
                            data:{
                                total_vnpay:total_vnpay,
                                order_coupon:order_coupon,
                                order_fee:order_fee,
                                _token:_token},
                                success:function(data){
                                    swal("Good job!", "Đặt hàng thành công", "success");
                                }
                        });
                        window.setTimeout(function(){ 
                            window.location.href = "{{url('/history')}}";
                        } ,1000);
                })
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.send_order').click(function(){
                    
                    var shipping_name = $('.shipping_name').val();
                    var shipping_email = $('.shipping_email').val();
                    var shipping_address = $('.shipping_address').val();
                    var shipping_phone = $('.shipping_phone').val();
                    var shipping_note = $('.shipping_note').val();
                    var shipping_method = $('.payment_select').val();
                    var order_fee = $('.order_fee').val();
                    var order_coupon = $('.order_coupon').val();
                    var _token = $('input[name="_token"]').val();
                    // alert(shipping_address);
                    if(shipping_name == '' || shipping_email == '' || shipping_address == '' || shipping_phone == ''|| shipping_method == ''){
                        alert('Vui lòng điền đầy đủ thông tin nhận hàng');
                    }else{
                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{
                                shipping_name:shipping_name,
                                shipping_email:shipping_email,
                                shipping_address:shipping_address,
                                shipping_phone:shipping_phone,
                                shipping_note:shipping_note,
                                order_fee:order_fee,
                                order_coupon:order_coupon,
                                shipping_method:shipping_method,
                                _token:_token},
                                success:function(data){
                                    swal("Good job!", "Đặt hàng thành công", "success");
                                }
                        });
                        window.setTimeout(function(){ 
                            window.location.href = "{{url('/history')}}";
                        } ,1000);
                    }
                    
                });
            });
        </script>
    </body>
</html>