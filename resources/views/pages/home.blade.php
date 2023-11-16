@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">Home / </li>
    </ol>
</nav>
<style>
    .bg{
        background-color: #fdaaba;
    }
</style>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="row">
            <div class="col-sm-1"><img src="resources/images/logo_shop.png" height="100px" width="100px"></div>
            <div class="col-sm-4 text-success" style="margin-top: 36px; padding-left:24px; font-family: MV boli;"><b>THIÊN ĐƯỜNG LÀM ĐẸP</b></div>
            
            
        </div>
        <div id="carouselExampleCaptions" class="carousel slide mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" data-ride="carousel">
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
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <h5 class="ml-3"><b>Sản Phẩm Mới Nhất</b></h5>
            <div class="row text-center ml-3">
                @foreach($all_product as $key => $product)
                
                    <div class="mb-2 shadow">
                                    <a href="{{URL::to('product-detail/'.$product->product_id)}}" class="text-decoration-none">
                                        <div class="card" style="width: 14rem; height: 23rem;">
                                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top shadow" alt="">
                                            <div class="card-body">
                                            <h6 class="card-title " style="width:height: 5rem;font-size: 0.78em">{{$product->product_name}}</h6>
                                            <b><p class="card-text text-danger">{{number_format($product->product_price,0,',','.')}} đ</p></b>
                                            <p class="card-text text-danger" style="font-size: 15px; text-decoration-line: line-through">{{number_format($product->product_price_real,0,',','.')}} đ</p>
                                            </div>
                                        </div>
                                    </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
<!--/recommended_items-->
@endsection