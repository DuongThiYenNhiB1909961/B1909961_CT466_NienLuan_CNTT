{{-- @extends('layout')
@section('content')

                        <h2 class="text-center text-warning"><b>Chi Tiết Mỹ Phẩm</b></h2>
                        <hr>
                <div class="row">
                    <div class="col-sm-10">                        
                            @foreach($detail_product as $key => $product)
                            <div class="row">
                                <div class=" col-sm text-center mt-1" >
                                    <img class="rounded mt-1" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" height="100%" width="100%">
                                                    
                                </div>
                                <div class="col-sm">
                                    <div class="text-danger">
                                        <h5><b style="font-size: 30px text-alight">{{$product->product_desc}}</b></h5>
                                    </div>
                                    <div>
                                        <h6 style="font-size: 15px text-alight">{{$product->product_content}}</h6>
                                    </div>
                                    <div>
                                        <h6 style="font-size: 15px text-alight"><b>Danh mục: </b><b class="text-danger"> {{$product->category_name}}</b></h6>
                                    </div>
                                    <div>
                                        <h6 style="font-size: 15px text-alight"><b>Xuất xứ: </b><b class="text-danger">{{$product->brand_name}}</b></h6>
                                    </div>
                                    <form action="{{URL::to('/save-cart')}}" method="POST">
                                        {{csrf_field()}}
                                        <div><h5 class="text-danger mt-2" style="font-size: 30px"><b>{{number_format($product->product_price).'đ'}}</h5></b></div>
                
                                        <label for=""><b>Số lượng:</b>  </label>
                                        <input type="number" name="qty" min="1" max="10" value="1">
                                        <input name="productid_hidden" type="hidden" value="{{$product->product_id}}">
                                                        
                                            <button type="submit" class="btn btn-default add-to-cart rounded-lg border border-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                                <b class="text-danger">Thêm vào giỏ hàng</b> 
                                            </button>
                                        </div>
                                    </form>
                            </div>
                            @endforeach
                        
                    </div>
                </div>
@endsection --}}
@extends('layout')
@section('content')

                <h2 class="text-center text-warning"><b>Chi Tiết Mỹ Phẩm</b></h2>
                <hr>
                <div class="row">
                    <div class="col-sm-10">                        
                            @foreach($detail_product as $key => $product)
                            <form >
                                @csrf
                            {{-- {{csrf_field()}} --}}
                            <div class="row">
                                
                                    <div class=" col-sm text-center mt-1" >
                                        <img class="rounded mt-1 mt-8 shadow" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" height="100%" width="100%">
                                                        
                                    </div>
                                    <div class="col-sm">
                                        <div class="text-danger">
                                            <h5><b style="font-size: 30px text-alight">{{$product->product_desc}}</b></h5>
                                        </div>
                                        <div>
                                            <h6 style="font-size: 15px text-alight">{{$product->product_content}}</h6>
                                        </div>
                                        <div>
                                            <h6 style="font-size: 15px text-alight"><b>Danh mục: </b><b class="text-danger"> {{$product->category_name}}</b></h6>
                                        </div>
                                        <div>
                                            <h6 style="font-size: 15px text-alight"><b>Xuất xứ: </b><b class="text-danger">{{$product->brand_name}}</b></h6>
                                        </div>
                                        
                                        
                                            <input type="hidden" class="cart_product_id_{{$product->product_id}}" value="{{$product->product_id}}">
                                            <input type="hidden" class="cart_product_name_{{$product->product_id}}" value="{{$product->product_name}}">
                                            <input type="hidden" class="cart_product_image_{{$product->product_id}}" value="{{$product->product_image}}">
                                            <input type="hidden" class="cart_product_price_{{$product->product_id}}" value="{{$product->product_price}}">
                                            <input type="hidden" value="1" class="cart_product_pty_{{$product->product_id}}">
                                            
                                            <div><h5 class="text-danger mt-2" style="font-size: 30px"><b>{{number_format($product->product_price).'đ'}}</h5></b></div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                            </svg>                
                                            <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart rounded-lg border border-danger" data-id="{{$product->product_id}}" name="add-to-cart">
                                    </div>       
                                
                                    
                            </div>
                        </form>
                            @endforeach
                        
                    </div>
                </div>
@endsection