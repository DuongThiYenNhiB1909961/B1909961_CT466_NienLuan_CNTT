@extends('layout')
@section('product')
<div class="row">
    <div class="col-sm-9">
        <h2 class="text-center text-warning"><b>Mỹ Phẩm</b></h2>
        <hr>
        <div class="row">
            @foreach($search_product as $key => $product)
            
                <div class="col-sm-3 rounded-lg border border-danger text-center mt-1" >
                                <a href="{{URL::to('product-detail/'.$product->product_id)}}" class="text-decoration-none">
                                    <img class="rounded mt-1" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" height="180px" width="180px">
                                    <div>
                                        <h6 style="font-size: 15px text-alight">{{$product->product_desc}}</h6>
                                    </div>
                                    <div><h5 class="text-danger mt-2"><b>{{number_format($product->product_price).'đ'}}</h6></b></div>
                                    
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
            <h5 class="mt-3"><b class="text-white mr-2"><u> Xuất xứ</u></b></h5>
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