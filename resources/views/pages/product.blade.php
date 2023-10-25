@extends('layout')
@section('product')
<div class="row" >
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <label for="amount"><b>Sắp Xếp Theo</b></label>
        <form>
            @csrf
            <select name="sort" id="sort" class="form-control">
                <option value="{{Request::url()}}?sort_by=none">---Lọc theo-</option>
                <option value="{{Request::url()}}?sort_by=tang_dan">--Giá tăng dần--</option>
                <option value="{{Request::url()}}?sort_by=giam_dan">--Giá giảm dần--</option>
                <option value="{{Request::url()}}?sort_by=az">--Lọc theo tên A đến Z--</option>
                <option value="{{Request::url()}}?sort_by=za">--Lọc theo tên Z đến A--</option>
            </select>
        </form>
    </div>
</div>
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
                                <div class=" text-lg font-semibold"><a href="{{URL::to('category/'.$cate->slug_category_product)}}" class="nav-link"><b>{{$cate->category_name}}</b></a></div>
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
                            <h6 class="panel-title color-text mr-2"><a href="{{URL::to('brand/'.$brand->slug_brand_product)}}" class="text-decoration-none"><b>{{$brand->brand_name}}</b></a></h6>
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
                                            <div class="card" style="width: 15rem; height: 25rem;">
                                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top shadow" alt="">
                                                <div class="card-body">
                                                <h6 class="card-title " style="width:height: 5rem;"><b>{{$product->product_desc}}</b></h6>
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
@endsection