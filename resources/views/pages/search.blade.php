@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item "><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;">Search</li>
    </ol>
</nav>
        <h2 class="text-center text-warning"><b>Kết quả tìm kiếm</b></h2>
        <hr>
<div class="">
    
    <div class="">
        <div class="row ml-3">
            @foreach($search_product as $key => $product)
            
            <div class="mb-2 shadow">
                <a href="{{URL::to('product-detail/'.$product->product_id)}}" class="text-decoration-none">
                    <div class="card" style="width: 14rem; height: 23rem;">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top shadow" alt="">
                        <div class="card-body">
                            <h6 class="card-title " style="width:height: 5rem;font-size: 0.78em">{{$product->product_name}}</h6>
                            <b><p class="card-text text-danger">{{number_format($product->product_price,0,',','.')}} đ <span class="badges">-{{number_format(100-($product->product_price*100/$product->product_price_real),0,',','.')}}%</span></p></b>
                            <p class="card-text text-danger" style="font-size: 15px; text-decoration-line: line-through">{{number_format($product->product_price_real,0,',','.')}} đ</p>
                            <p class="card-text text-body" style="font-size: 12px; ">Đã bán: {{$product->product_sold}}</p>
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