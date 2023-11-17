<!DOCTYPE html>
    <head>
        <title>Manage</title>
        <link rel="icon" href="{{asset('resources/images/logoshop1.png')}}" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        
        <!-- bootstrap-css -->
        <link rel="stylesheet" href="{{asset('resources/css/bootstrap.min.css')}}" >
        <!-- //bootstrap-css -->
        <!-- Custom CSS -->
        {{-- <link href="resources/css/style_a.css" rel='stylesheet' type='text/css' /> --}}
        <link href="{{asset('resources/css/style_a.css')}}" rel='stylesheet' type='text/css' />
        <link href="{{asset('resources/css/style-responsive.css')}}" rel="stylesheet"/>
        <!-- font CSS -->
        <link href="{{asset('//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic')}}" rel='stylesheet' type='text/css'>
        <!-- font-awesome icons -->
        <link rel="stylesheet" href="{{asset('resources/css/font.css')}}" type="text/css"/>
        <link href="{{asset('resources/css/font-awesome.css')}}" rel="stylesheet"> 
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <!-- calendar -->
        <link rel="stylesheet" href="{{asset('resources/css/monthly.css')}}">
        <link href="{{asset('resources/css/sweetalert.css')}}">
        <link name="csrf-token" content="{{csrf_token()}}">
        <!-- //calendar -->
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        {{-- datatable css --}}
        <link href="{{asset('resources/css/datatables.min.css')}}" rel="stylesheet">
        {{-- //datatable css --}}
        
        <!-- //font-awesome icons -->
        {{-- <link rel="stylesheet" href="{{asset('resources/css/morris.css')}}"> --}}
        <script src="{{asset('resources/js/jquery2.0.3.min.js')}}"></script>
        <script src="{{asset('resources/js/raphael-min.js')}}"></script>
        {{-- chart --}}
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        {{-- //chart --}}

        

    </head>
<body>
    <section id="container rounded">
        <!--header start-->
        <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="#" class="logo">
                Admin
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="resources/images/4.png">
                        <span class="username">
                            <?php
                            if(Session::get('login_normal')){
                                $name = Session::get('admin_name');
                            }else {
                                $name = Session::get('admin_name');
                            }
                                
                                if($name){
                                    echo $name;
                                }
                            ?>
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        
                    </ul>
                    
                </li>
                <!-- user login dropdown end -->
            
            </ul>
            <!--search & user info end-->
        </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{asset('manage')}}">
                                <i class="fa fa-dashboard"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh mục mỹ phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{asset('add-category-product')}}">Thêm danh mục mỹ phẩm</a></li>
                                <li><a href="{{asset('all-category-product')}}">Liệt kê danh mục mỹ phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Xuất xứ mỹ phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{asset('add-brand-product')}}">Thêm nơi sản xuất mỹ phẩm</a></li>
                                <li><a href="{{asset('all-brand-product')}}">Liệt kê nơi sản xuất mỹ phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Mỹ Phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{asset('add-product')}}">Thêm mỹ phẩm</a></li>
                                <li><a href="{{asset('all-product')}}">Liệt kê mỹ phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Đơn Hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{asset('manage-order')}}">Quản Lý Đơn Hàng</a></li>
                                
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Mã giảm giá</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{asset('add-coupon')}}">Thêm mã giảm giá</a></li>
                                <li><a href="{{asset('all-coupon')}}">Liệt kê mã giảm giá</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Vận chuyển</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{asset('delivery')}}">Quản lý vận chuyển</a></li>
                                
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Slider</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{asset('add-slider')}}">Thêm slider</a></li>
                                <li><a href="{{asset('list-slider')}}">Liệt kê slider</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Comment</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{asset('list-cmt')}}">Liệt kê comment</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{asset('logoutad')}}">
                                <i class="fa fa-key"></i>
                                Log Out
                            </a>
                        </li>
                    </ul>            </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('dashboard')
                @yield('content')
                @yield('add_category_product')
                @yield('edit_category_product')
                @yield('all_category_product')
                @yield('add_brand_product')
                @yield('all_brand_product')
                @yield('edit_brand_product')
                @yield('add_product')
                @yield('all_product')
                @yield('edit_product')
                @yield('manage_order')
                @yield('view_order')
            </section>
            <!-- footer -->
                <div class="footer">
                    <div class="wthree-copyright">
                    <p>© 2023 Visitors. All rights reserved | Designer</a></p>
                    </div>
                </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>

    <script src="{{asset('resources/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('resources/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('resources/js/scripts.js')}}"></script>
    <script src="{{asset('resources/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('resources/js/jquery.nicescroll.js')}}"></script>
    {{-- chart --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
       
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    
    
	<script type="text/javascript" src="{{asset('resources/js/monthly.js')}}"></script>

    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    {{-- //chart --}}
    <script src="resources/js/jquery.scrollTo.js"></script>
    <!-- morris JavaScript -->	
    
    {{-- datatable js --}}
    <script src="{{asset('resources/js/datatables.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            chart30daysorder();
           
            var chart = new Morris.Line({
                
                element: 'mychart',
                // lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56']
                // pointFillColors: ['#ffff'],
                // pointStrokeColors: ['black'],
                    fillOpacity: 0.3,
                    hideHover: 'auto',
                    parseTime: false,
                
                xkey: 'period',
                
                ykeys: ['order', 'sales', 'profit','spend', 'quantity'],
                behaveLikeLine: true,
                labels: ['đơn hàng', 'doanh số', 'lợi nhuận','chi tiêu', 'số lượng đơn hàng']
            });
            
            function chart30daysorder(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url : '{{url('/days30Order')}}',
                    method: 'POST',
                    dataType:"JSON",
                    data:{_token:_token},
                    success:function(data){
                        chart.setData(data);
                        }
                })
            }
            $('.dashboard_filter_option').change(function(){
                
                var dashboard_val = $(this).val();
                var _token = $('input[name="_token"]').val();
                // alert(dashboard_val);
                $.ajax({
                    url : '{{url('/dashboard-option')}}',
                    method: "POST",
                    dataType:"JSON",
                    data:{dashboard_val:dashboard_val, _token:_token},
                    success:function(data){
                        chart.setData(data);
                        }
                });
            });
            $('#dashboard_filter').click(function(){
                var _token = $('input[name="_token"]').val();
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker1').val();
                
                $.ajax({
                    url : "{{url('/filterbydate')}}",
                    method: "POST",
                    dataType:"JSON",
                    data:
                        {
                            from_date:from_date, 
                            to_date:to_date, 
                            _token:_token
                        },
                    success:function(data){
                        chart.setData(data);
                        }
                });
            });
   
        });
    </script>
    <script>
        $(document).ready(function(){
            var colorDanger = "#FF1744";
            Morris.Donut({
                element: 'donut',
                resize: true,
                colors: [
                    '#FFCC99',
                    '#66FF00',
                    '#00FFFF',
                    '#FF6666',
                    '#FF00FF'
                ],
                
                data: [
                    {label:"Sản Phẩm", value:{{$product}}},
                    {label:"Đơn Hàng", value:{{$order_count}}},
                    {label:"Khách Hàng", value:{{$customer}}},
                    {label:"Bài Viết", value:4},
                    {label:"Admin", value:{{$admin}}}
                ]
            });
        });
    </script>
    <script>

        $( function() {
            $( "#datepicker" ).datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy-mm-dd",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
            $( "#datepicker1" ).datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "yy-mm-dd",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
            $( "#datepicker2" ).datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "dd/mm/yy",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
            $( "#datepicker3" ).datepicker({
                prevText: "Tháng trước",
                nextText: "Tháng sau",
                dateFormat: "dd/mm/yy",
                dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
                duration: "slow"
            });
        });
    </script>
    
    <script type="text/javascript">
            $.validate({

            });
    </script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->


    <script type="text/javascript">
        let table = new DataTable('#myTable');
    </script>

    <script>
        $(document).ready(function() {
            //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });
        
            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }
            
            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,
                data: [
                    {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                    {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                    {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                    {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                    {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                    {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                    {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                    {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                    {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
                
                ],
                lineColors:['#eb6f6f','#926383','#eb6f6f'],
                xkey: 'period',
                redraw: true,
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });
            
        
        });
    </script>
        <!-- calendar -->

	
    <script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
    {{-- Delivery --}}
   <script type="text/javascript">
       $('.order_status').change(function(){
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();

            //lay ra so luong
            quantity = [];
            $("input[name='order_sales_quantity']").each(function(){
                quantity.push($(this).val());
            });
            //lay ra product id
            order_product_id = [];
            $("input[name='order_product_id']").each(function(){
                order_product_id.push($(this).val());
            });
            j = 0;
            for(i=0 ; i<order_product_id.length ; i++){
                //so luong khach dat
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //so luong ton kho
                var order_qty_inventory = $('.order_qty_inventory_' + order_product_id[i]).val();

                if(parseInt(order_qty) > parseInt(order_qty_inventory)){
                    j = j + 1;
                    if(j==1){
                        alert('Số lượng bán trong kho không đủ');
                    }
                    $('.color_qty_'+order_product_id[i]).css('background','#FF6A6A');
                }
            }
            if(j==0){
            
                    $.ajax({
                            url : '{{url('/update-inventory-qty')}}',
                                method: 'POST',
                                data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                                success:function(data){
                                    alert('Thay đổi tình trạng đơn hàng thành công');
                                    location.reload();
                                }
                    });
                
            }

        });
   </script>
   <script>
    $('.reply_comment').click(function(){
        var comment_id = $(this).data('comment_id');
        var comment = $('.reply_content_' + comment_id).val();
        
        var product_id = $(this).data('product_id');
        var _token = $('input[name="_token"]').val();
        
        $.ajax({
                url : '{{url('/reply-cmt')}}',
                method: 'POST',
                data:{
                    comment:comment,
                    comment_id:comment_id,
                    product_id:product_id,
                    _token:_token
                },
                success:function(data){
                    comment.val('');
                    location.reload();
                }
            });
    })
    $(document).on('change','.text-ellipsis',function(){
        location.reload();
    })
   </script>
   <script>
    $(document).ready(function(){
        load_gallery();
        
        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/select-gallery')}}',
                method: 'POST',
                data:{
                    pro_id:pro_id,
                    _token:_token
                },
                success:function(data){
                $('#gallery_load').html(data);
                }
            });
        }
        $(document).on('blur','.edit_name_gal',function(){
                    var gal_id = $(this).data('gal_id');
                    var gal_text = $(this).text();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url : '{{url('/edit-name-gal')}}',
                        method: 'POST',
                        data:{
                            gal_id:gal_id,
                            gal_text:gal_text,
                            _token:_token
                        },
                        success:function(data){
                            load_gallery();
                        }
                    });
        });
        $(document).on('change','.file_img',function(){
                    var gal_id = $(this).data('gal_id');
                    var image = document.getElementById('file-'+gal_id).files[0];
                    // var _token = $('input[name="_token"]').val();
                    var form_data = new FormData();

                    form_data.append("file",document.getElementById('file-'+gal_id).files[0]);
                    form_data.append("gal_id",gal_id);
                    $.ajax({
                        url : '{{url('/update-gal')}}',
                        method: 'POST',
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: form_data,
                        
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data){
                            load_gallery();
                        }
                    });
        });
        $(document).on('click','.delete-gallery',function(){
                    var gal_id = $(this).data('gal_id');
                    var _token = $('input[name="_token"]').val();
                    if(confirm('Bạn có chắc chắn xóa ảnh này không?')){
                        $.ajax({
                            url : '{{url('/del-gal')}}',
                            method: 'POST',
                            data:{
                                gal_id:gal_id,
                                _token:_token
                            },
                            success:function(data){
                                load_gallery();
                                
                            }
                        });
                    }
                    
        });
        $('#file').change(function(){
            var error = '';
            var file = $('#file')[0].files;

            if(file.length>5){
                error+='<p>Bạn chọn tối đa chỉ được 5 ảnh</p>';
            }else if(file.length==''){
                error+='<p>Bạn không được bỏ trống ảnh</p>';
            }else if(file.size > 2000000){
                error+='<p>Kích thước ảnh phải nhỏ hơn 2mb</p>';
            }
            if(error==''){

            }else{
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                return false;
            }
        })
        
    });
   </script>
    <script type="text/javascript">
        $(document).ready(function(){
            fetch_delivery();
    
            function fetch_delivery(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url : '{{url('/select-feeship')}}',
                    method: 'POST',
                    data:{_token:_token},
                    success:function(data){
                    $('#load_delivery').html(data);
                    }
                });
            }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                fetch_delivery();
                }
            });

            });
            $('.add_delivery').click(function(){
    
               var city = $('.city').val();
               var district = $('.district').val();
               var wards = $('.wards').val();
               var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
               //alert(city);
               // alert(district);
               // alert(wards);
               // alert(fee_ship);
                $.ajax({
                url : '{{url('/add-delivery')}}',
                method: 'POST',
                data:{city:city, district:district, wards:wards, fee_ship:fee_ship, _token:_token},
                success:function(data){
                    fetch_delivery();
                }
            });
    
    
            });
          
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
                    url : '{{url('/select-delivery')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                       $('#'+result).html(data);     
                    }
                });
            }); 
        })
    </script>
    {{-- //Delivery --}}
    
</body>
</html>
