@extends('layout')
@section('home')
<div style="margin-top: 8%">
<style>
    .bg{
        background-color: #fdaaba;
    }
    .carousel{
        height: 100%;
        padding: 10px;
    }
</style>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="row" style="padding-top: 12px;padding-left: 16px;">
            <div class="col-sm-1"><img src="resources/images/logoshop1.png" height="100px" width="100px"></div>
            <div class="col-sm-4 text-danger" style="margin-top: 36px; padding-left:24px; font-family: MV boli;"><b>THIÊN ĐƯỜNG LÀM ĐẸP</b></div>
            
            
        </div>
        <h5 class="rounded-lg container" >
            <p class="mr-2 text-info" style="font-family: MV boli;"> 
                Danh mục nổi bậc
            </p>
        </h5>
        <nav class="navbar navbar-expand-lg navbar-light bg-light text-center container">
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach($category as $key => $cate)
                    <li class="nav-item ">
                        <div class="flex items-center">
                            <div class=" text-lg font-semibold"><a href="{{URL::to('category/'.$cate->slug_category_product)}}" class="nav-link">
                                <img src="public/uploads/cate/{{$cate->category_image}}" width="100px" height="110px">
                                <p class="text-info ">{{$cate->category_name}}</p>
                            </a></div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
        <div id="carouselExampleCaptions" class="carousel slide mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"  data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                
                    @php 
                                $i = 0;
                            @endphp
                            @foreach($slider as $key => $slide)
                            
                                @php 
                                    $i++;
                                @endphp
                                <div class="carousel-item {{$i==1 ? 'active' : '' }}">
                                    <img style="height: 12cm" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block" style="z-index: 0">
                                        <h5 class="text-light bg dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">{{$slide->slider_name}}</h5>
                                        <p class="text-light bg dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" >{{$slide->slider_desc}}</p>
                                    </div>
                                </div>
                    @endforeach 
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    <div class="container">
        <div  class="text-danger">
           <center><b>MÃ GIẢ GIÁ</b></center> 
       </div>
        <style>
            .coupon{
              border: 2px solid #35dccb;
              margin: 2px 0 2px;
              border-top-right-radius: 25%;
              border-bottom-left-radius: 25%;
            }
            .date{
              border: 2px solid #dc3554;
              border-top-right-radius: 25%;
              border-bottom-left-radius: 25%;
            }
          </style>
            <div class="table-agile-info">
                <div class="row panel panel-default">
                @foreach ($coupon as $key => $cou)
                    <div class="col-sm-6 coupon mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" >
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">{{$cou->coupon_name}}</th>
                            <div></div>
                            <div></div>
                            <div></div>
                            <th scope="col">{{$cou->coupon_date_start}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="row">
                                Còn lại: {{$cou->coupon_time}}
                                <br>
                                <b class="text-danger">Nhập Mã Ngay</b>
                            </td>
                            <div></div>
                            <div></div>
                            <div></div>
                            <td>
                            <b class="text-danger">Code: {{$cou->coupon_code}}</b><br>
                            @if($cou->coupon_date_end >= $now)
                            <input type="button" class="text-success date" value="Còn hạn">
                            @else
                            <input type="button" class="text-danger date" value="Hết hạn">
                            @endif
            
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div> 
                @endforeach
                
                </div>
            </div> 
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
            <h5 class="ml-3"><b>Sản Phẩm Mới Nhất</b></h5>
            <div >
                @foreach($all_product as $key => $product)
                
                    <div class="mb-2 ml-2">
                        <div id="home_product" class="row text-center"></div>
                                    
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>

<!--/recommended_items-->
@endsection