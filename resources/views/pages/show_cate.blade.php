@extends('layout')
@section('content')
<div class="row" >
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
    <div class="col-sm-4">
        <label for="amount"><b>Lọc Giá</b></label>
        <form>
            <div id="slider-range"></div>
            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            <input type="hidden" name="start_price" id="start_price">
            <input type="hidden" name="end_price" id="end_price">
            <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-danger btn-sm">
        </form>
    </div>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Category</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">{{$meta_title}}</li>
    </ol>
  </nav>
<h2 class="text-center text-warning"><b>DANH MỤC MỸ PHẨM</b></h2><hr>

<div class="row mt-2">
    <div class="col-sm-10">
        <div class="row ml-3">
            @foreach($category_by_id as $key => $product)
            
                <div class="ml-3 mb-3 shadow" >
                                <a href="{{URL::to('product-detail/'.$product->product_id)}}" class="text-decoration-none">
                                    <div class="card" style="width: 15rem; height: 25rem;">
                                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>{{$product->product_desc}}</b></h6>
                                            <b><p class="card-text text-danger">{{number_format($product->product_price).'đ'}}</p></b>
                                            <p class="card-text text-danger" style="font-size: 15px; text-decoration-line: line-through">{{number_format($product->product_price_real,0,',','.')}} đ</p>
                                        </div>
                                      </div>
                                </a>
                </div>
        
            @endforeach
        </div>
    </div>
    <div class="col-sm-2">
        <div class="text-center mt-1 shadow">
            <h5><b class="text-danger mr-2 text-center"> 
                Danh Mục
            </b></h5>
            <hr>
            <div class="panel panel-default mt-3">
                @foreach($category as $key => $cate)
                <div class="panel-heading">
                    <h6 class="panel-title color-text mr-2 " style="color: rgb(175, 6, 161);"><a href="{{URL::to('category/'.$cate->slug_category_product)}}" class="text-decoration-none"><b>{{$cate->category_name}}</b></a></h6>
                </div>
                <hr>
                 @endforeach
            </div>
           
        </div>
        <div class="text-center mt-5 shadow">
            <h5 ><b class="text-danger mr-2">Xuất Xứ</b></h5>
            <hr>
            <div class="panel panel-default mt-3">
                @foreach($brand as $key => $brand)
                <div class="panel-heading">
                    <h6 class="panel-title color-text mr-2" style="color: rgb(175, 6, 161);"><a href="{{URL::to('brand/'.$brand->slug_brand_product)}}" class="text-decoration-none"><b>{{$brand->brand_name}}</b></a></h6>
                </div>
                <hr>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection