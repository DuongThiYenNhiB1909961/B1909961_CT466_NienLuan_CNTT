@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item "><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;">Search</li>
    </ol>
</nav>
        <h2 class="text-center text-warning"><b>Mỹ Phẩm</b></h2>
        <hr>
<div class="row">
    <div class="col-sm-2">
        <div class="text-center mt-1 shadow">
            <h5 ><b class="text-danger mr-2 text-center"> 
                Danh Mục
            </b></h5>
            <div class="panel panel-default mt-3">
                @foreach($category as $key => $cate)
                <div class="panel-heading">
                    <h6 class="panel-title color-text mr-2"><a href="{{URL::to('category/'.$cate->slug_category_product)}}" class="text-decoration-none"><b>{{$cate->category_name}}</b></a></h6>
                </div>
                <hr>
                 @endforeach
            </div>
           
        </div>
        <div class="text-center mt-5 shadow">
            <h5 ><b class="text-danger mr-2">Xuất Xứ</b></h5>
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
        <div class="row ml-3">
            @foreach($search_product as $key => $product)
            
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
                    @for($count=1; $count<=5; $count++)
                            @php
                            if($count <= $rating){
                                $color = 'color: #ffcc00;';
                            }else {
                                $color = 'color: #ccc;';
                            }
                            @endphp
                            <li title="Đánh giá sao" 
                                id="{{$product->product_id}}-{{$count}}"
                                data-index="{{$count}}" 
                                data-product_id="{{$product->product_id}}" 
                                data-rating="{{$rating}}" 
                                class="list-inline-item"
                                style="cursor: pointer; {{$color}} font-size: 30px;" >
                                &#9733;</li>

                        @endfor
                        <p class="text-danger list-inline-item">{{$rating}}/5</p>
                </a>
            </div>
        
            @endforeach
        </div>
    </div>
    
</div>
@endsection