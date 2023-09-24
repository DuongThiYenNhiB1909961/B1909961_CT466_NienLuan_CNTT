@extends('layout')
@section('product')
<hr>
<h4 class="rounded-lg" >
    <b class="mr-2 text-center"> 
        Danh Mục Nổi Bậc
    </b
></h4>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @foreach($category as $key => $cate)
                        <li class="nav-item">
                            <div class="flex items-center">
                                <div class=" text-lg font-semibold"><a href="{{URL::to('category/'.$cate->id)}}" class="nav-link"><b>{{$cate->category_name}}</b></a></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
            </div>
            </nav>
        <h2 class="text-center text-warning"><b>Mỹ Phẩm</b></h2>
        
        <div class="row mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="col-sm-2">
                <div class="text-center mt-5 mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <h4 class="mt-3 rounded-lg "><b class="text-danger mr-2">Xuất Xứ</b></h4>
                    <hr>
                    <div class="panel panel-default mt-3">
                        @foreach($brand as $key => $brand)
                        <div class="panel-heading">
                            <h6 class="panel-title color-text mr-2"><a href="{{URL::to('brand/'.$brand->id)}}" class="text-decoration-none"><b>{{$brand->brand_name}}</b></a></h6>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-10">
                <div class="row text-center ml-3">
                    @foreach($all_product as $key => $product)
                    
                        <div class="mr-2 mb-2 shadow">
                                        <a href="{{URL::to('product-detail/'.$product->product_id)}}" class="text-decoration-none">
                                            <div class="card" style="width: 15rem; height: 22rem;">
                                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top shadow" alt="">
                                                <div class="card-body">
                                                <h6 class="card-title "><b>{{$product->product_desc}}</b></h6>
                                                <b><p class="card-text text-danger">{{number_format($product->product_price).'đ'}}</p></b>
                                                </div>
                                            </div>
                                        </a>
                        </div>
                
                    @endforeach
                </div>
            </div>
            
        </div>
@endsection