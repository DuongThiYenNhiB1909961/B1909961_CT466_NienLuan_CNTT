@extends('layout')
@section('content')

<div class="table-agile-info shadow">
    <div class="panel panel-default">
                <hr>   
                            <style>
                                .lSSlideOuter .lSPager.lSGallery img {
                                    display: block;
                                    height: 120px;
                                    max-width: 100%;
                                }
                                li.active {
                                    border: 1px solid #dc3545;
                                }
                            </style>                 
                            @foreach($detail_product as $key => $product)
                            <form >
                                @csrf
                            {{-- {{csrf_field()}} --}}
                            <div class="row">
                                
                                    <div class=" col-sm-4 text-center m-1" >
                                        <ul id="imageGallery">
                                            @foreach($gallery as $key => $gal)
                                                <li data-thumb="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" data-src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}">
                                                <img width="100%" alt="{{$gal->gallery_name}}" src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" />
                                                </li>
                                            @endforeach
                                          </ul>             
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="text-danger">
                                            <h5><b style="font-size: 30px text-alight">{{$product->product_desc}}</b></h5>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm">
                                                <h6 style="font-size: 15px text-alight"><b>Danh mục hàng: </b>{{$product->category_name}}</h6>
                                                <h6 style="font-size: 15px text-alight"><b>Được sản xuất từ: </b>{{$product->brand_name}}</h6>
                                            </div>
                                            <div class="col-sm">
                                                <h6 style="font-size: 15px text-alight"><b>Dung tích: </b>{{$product->product_capacity}}</h6>
                                                <h6 style="font-size: 15px text-alight"><b>Tình trạng: </b></h6>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                            <input type="hidden" class="cart_product_id_{{$product->product_id}}" value="{{$product->product_id}}">
                                            <input type="hidden" class="cart_product_name_{{$product->product_id}}" value="{{$product->product_name}}">
                                            <input type="hidden" class="cart_product_image_{{$product->product_id}}" value="{{$product->product_image}}">
                                            <input type="hidden" class="cart_product_price_{{$product->product_id}}" value="{{$product->product_price}}">
                                            <input type="hidden" class="cart_product_quantity_{{$product->product_id}}" value="{{$product->product_qty}}">
                                            
                                            <div><h5 class="text-danger mt-2" style="font-size: 30px"><b>{{number_format($product->product_price,0,',','.')}} đ</h5></b>
                                                <p class="mt-2" style="font-size: 20px; text-decoration-line: line-through">{{number_format($product->product_price_real,0,',','.')}} đ</p>
                                            </div>
                                            <div class="mt-2">
                                                <label><b>Số lượng: </b></label>
                                                <input type="number" min="1" max="50" value="1" class="cart_product_pty_{{$product->product_id}}">

                                            </div>
                                            
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                                </svg>                
                                                <input type="button" value="Thêm vào giỏ hàng" class="btn btn-default add-to-cart rounded-lg border border-danger" data-id="{{$product->product_id}}" name="add-to-cart">
                                       
                                            <div class="mt-3">
                                                <h6 style="font-size: 15px text-alight"><b>Thời gian giao hàng: </b>Giao hàng trong vòng 7 ngày</h6>
                                                <h6 style="font-size: 15px text-alight"><b>Chính sách đổi trả: </b>Đổi trả sản phẩm trong 30 ngày</h6>
                                            </div>
                                            
                                    </div>       
                                
                                    
                            </div>
                        </form>
                            @endforeach
                        
    </div>
</div>
        <div class="table-agile-info shadow mt-2">
            <div class="panel panel-default">
                
                    <h4 class="title text-left text-danger"><b>Sản phẩm liên quan</b></h4>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner"><div class="">
                            <div class="row text-center ml-3 item active">
                                @foreach($relate as $key => $lienquan)
                                        <div class="mr-1 mb-2">
                                            <div class="product-image-wrapper">
                                                <div class="productinfo text-center">
                                                    <a href="{{URL::to('product-detail/'.$lienquan->product_id)}}" class="text-decoration-none">
                                                        <div class="card" style="width: 12rem; height: 22rem;">
                                                            <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" class="card-img-top" alt="">
                                                            <div class="card-body">
                                                            <h6 class="card-title "><b>{{$lienquan->product_desc}}</b></h6>
                                                            <b><p class="card-text text-danger">{{number_format($lienquan->product_price).'đ'}}</p></b>
                                                            <p class="mt-2" style="font-size: 15px; text-decoration-line: line-through">{{number_format($lienquan->product_price_real,0,',','.')}} đ</p>
                                                            </div>

                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach		

                            
                            </div>
                                
                        </div>
                                
                    </div>
               
            </div>
        </div>
    </div>
    
        <div class="table-agile-info shadow mt-2">
            <div class="panel panel-default">
                <div class="recommended_items mt-2  ml-2">
                    <h4 class="title text-left text-danger"><b>Thông Tin Chi Tiết</b></h4>
                    @foreach($detail_product as $key => $product)
                    <div class="row">
                        <div class="col-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Mô tả sản phẩm</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Chi tiết sản phẩm</a>
                          </div>
                        </div>
                        <div class="col-8">
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">{{$product->product_content}}</div>
                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                <p><b>Tồn kho: </b>{{$product->product_qty}}</p>
                                <p><b>Được gửi từ: </b>{{$product->brand_name}}</p>
                                <p><b>Dung tích: </b>{{$product->product_capacity}}</p>
                                <p><b>Công dụng: </b>{{$product->product_name}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
        <div class="table-agile-info shadow mt-2">
            <div class="panel panel-default">
                <div class="recommended_items mt-2  ml-2">
                    <h4 class="title text-left text-danger"><b>Đánh giá sản phẩm</b></h4>
                    <form>
                        @csrf
                        <input type="hidden" class="comment_product_id" name="comment_product_id" value="{{$product->product_id}}">
                        <div id="load_comment"></div>  
                    </form>
                                
                                            
                                <h4 class="text-success"><b>Đánh giá từ khách hàng <p class="text-danger list-inline-item" >{{$rating}}/5 </p><p style="color: #ffcc00;" class="list-inline-item">&#9733;</p> </b></h4>
                                
                                @php
                                    $j=0;
                                @endphp
                                @foreach($rating_id as $key => $ra)
                                    @for($i=0; $i<$ra->rating_id; $i++)
                                        @if((Session::get('customer_id')==$ra->customer_id) && $ra->product_id)    
                                            @php
                                                $j++;
                                            @endphp
                                        @endif
                                    @endfor
                                @endforeach
                                    @if(Session::get('customer_id') && $j<1) 

                                    
                                    <b style="margin-left: 14rem">Đánh giá <p class="text-danger list-inline-item">{{$rating}}/5</p> sao</b>
                                        <ul class="list-inline-item" title="Average Rating">
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
                                                    class="rating list-inline-item"
                                                    style="cursor: pointer; {{$color}} font-size: 30px;" >
                                                    &#9733;</li>

                                            @endfor
                                        </ul>
                                        <form>
                                            <div id="status"></div>
                                            @csrf
                                            
                                            <div style="margin-left: 14rem">
                                                <span>
                                                @if(Session::get('customer_picture'))
                                                    <img src="{{Session::get('customer_picture')}}" alt="{{Session::get('customer_picture')}}" width="5%">
                                                @else
                                                    <img src="/public/uploads/product/user1.png" alt="" width="5%">
                                                @endif
                                                <input type="hidden" class="comment_name" value="{{Session::get('customer_name')}}">
                                                <b class=" text-danger">{{Session::get('customer_name')}}</b>
                                            </span><br>
                                                <textarea class="comment_content" name="comment_content" id="" cols="60" rows="5" style="border: 1px solid #000;" placeholder="Viết bình luận của bạn"></textarea>
                                                
                                                <br><input type="button" class="btn btn-danger pull-right send_cmt" value="Comment">
                                            </div>    
                                        </form>
    
                                @elseif(Session::get('customer_id') && $j>1)
                                <div style="margin-left: 22rem">
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
                                </div>
                                    <br><b class="text-primary" style="margin-left: 22rem">Cảm ơn bạn đã đánh giá và bình luận.</b>
                                @elseif(Session::get('customer_id')==null && $j<1)
                                    <br><b class="text-primary">Chỉ có thành viên mới có thể đánh giá và bình luận.</b>
                                @endif
                                
                    </div>
                </div>
            </div>
        </div>
@endsection