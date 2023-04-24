@extends('layout')
@section('product')

        <h2 class="text-center text-warning"><b>Mỹ Phẩm</b></h2>
        <hr>
<div class="row">
    <div class="col-sm-10">
        <div class="row text-center">
            @foreach($all_product as $key => $product)
            
                <div class="mr-4 mb-3" >
                                <a href="{{URL::to('product-detail/'.$product->product_id)}}" class="text-decoration-none">
                                    <div class="card" style="width: 15rem; height: 22rem;">
                                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top" alt="">
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
    <div class="col-sm-2">
        <div class="text-center mt-1">
            <h4 class="rounded-lg" ><b class="text-danger mr-2 text-center"> 
                Danh Mục
            </b></h4>
            <hr>
            <div class="panel panel-default mt-3">
                @foreach($category as $key => $cate)
                <div class="panel-heading">
                    <h6 class="panel-title color-text mr-2"><a href="{{URL::to('category/'.$cate->id)}}" class="text-decoration-none"><b>{{$cate->category_name}}</b></a></h6>
                </div>
                <hr>
                 @endforeach
            </div>
           
        </div>
        <div class="text-center mt-5">
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
</div>
@endsection