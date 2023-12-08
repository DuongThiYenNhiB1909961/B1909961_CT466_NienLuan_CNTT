@extends('layout')
@section('product')
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
                <div id="slider-range" style="z-index: 0;"></div>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                <input type="hidden" name="start_price" id="start_price">
                <input type="hidden" name="end_price" id="end_price">
                <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-danger btn-sm">
            </form>
        </div>
    </div>

    <hr>
    <h4 class="rounded-lg" >
        <b class="mr-2 text-center"> 
            Danh mục nổi bậc
        </b>
    </h4>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    
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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-danger">
          <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
          <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page" >Mỹ phẩm</li>
        </ol>
    </nav>
    <h2 class="text-center text-danger"><b>Mỹ Phẩm</b></h2>
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
            <div class="row ml-3 text-center">
                
                @foreach($all_product as $key => $product)
                    
                    <div class="mr-4 mb-4 shadow">
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
                                        style="cursor: pointer; {{$color}} font-size: 15px;" >
                                        &#9733;</li>
        
                                @endfor
                                
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>

@endsection