@extends('layout')
@section('product')
<div class="row">
    <div class="col-sm-9">
        <h2 class="text-center text-warning"><b>Mỹ Phẩm</b></h2>
        <hr>
        <div class="row">
            @foreach($all_product as $key => $product)
            
                <div class="col-sm-3 rounded-lg border border-danger text-center mt-1" >
                                <a href="{{URL::to('product-detail/'.$product->product_id)}}" class="text-decoration-none">
                                    <img class="rounded mt-1" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" height="180px" width="180px">
                                    <div>
                                        <h6 style="font-size: 15px text-alight">{{$product->product_desc}}</h6>
                                    </div>

                                    <div ><h5 class="text-danger mt-2"><b class="price">{{number_format($product->product_price).'đ'}}</h6></b></div>
                                    
                                    {{-- <a href="#" class="btn btn-default add-to-cart">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                        Thêm vào giỏ hàng
                                    </a> --}}
                                </a>
                </div>
        
            @endforeach
        </div>
    </div>
    <div class="col-sm-3 mt-5">
        <div class="text-right bg-warning rounded-lg">
            <h5><b class="text-white mr-2"><u> DANH MỤC</u></b></h5>
            <div class="panel panel-default mt-3">
                @foreach($category as $key => $cate)
                <div class="panel-heading">
                    <h6 class="panel-title text-white mr-2"><a href="{{URL::to('category/'.$cate->id)}}" class="text-decoration-none">{{$cate->category_name}}</a></h6>
                </div>
                 @endforeach
            </div>
           
        </div>
        <div class="text-right bg-warning rounded-lg">
            <h5 class="mt-3"><b class="text-white mr-2"><u> THƯƠNG HIỆU</u></b></h5>
            <div class="panel panel-default mt-3">
                @foreach($brand as $key => $brand)
                <div class="panel-heading">
                    <h6 class="panel-title text-white mr-2"><a href="{{URL::to('brand/'.$brand->id)}}" class="text-decoration-none">{{$brand->brand_name}}</a></h6>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection