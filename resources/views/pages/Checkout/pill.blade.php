@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li class="active text-danger text-center">Thanh toán giỏ hàng</li>
            </ol>
        </div>

        <div class="review-payment">
            <h2 class="text-danger text-center">Xem Lại Đơn Hàng Của Bạn</h2>
        </div>
        <div class="table-responsive">
          <form action="{{url('update-cart')}}" method="POST">
          @csrf
          {{-- {{csrf_field()}} --}}
          <table class="table table-striped b-t b-light rounded-lg">
              <thead >
                <tr class="bg-warning text-white ">
                  <th>Tên mỹ phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                  
                </tr>
              </thead>
              <tbody>
                @if(Session::get('cart')==true)
                @php
                    $total = 0;
                    $cart_product = Session::get('cart');
                @endphp
                @foreach($cart_product as $key => $cart)
                  @php
                    $subtotal = $cart['product_price']*$cart['product_qty'];
                    $total += $subtotal;
                  @endphp
                  <tr>
                  <th class="cart_name"><p>{{$cart['product_name']}}</p></th>
                  <th class="cart_image">
                    <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" height="100" width="100" alt="{{$cart['product_image']}}">
                  </th>
                  <th class="cart_price">
                    <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                  </th>
                  <th class="cart_qty">
                    <p class="text-center">{{$cart['product_qty']}}</p>
                  </th>
                  <th class="cart_total">
                    <p>
                      {{number_format($subtotal,0,',','.')}}đ
                    </p>
                  </th>
                  
                </tr> 
    
                @endforeach
                <tr class="shadow">
                <td colspan="3"></td>
                  <td colspan="2">
                    <ul>
                      <div><b>Tổng tiền hàng: {{number_format($total,0,',','.')}}đ</b></div>
                      
                      <div>
                        @if(Session::get('fee'))
                      <b>Phí Vận Chuyển 
                        <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span>
                        
                        <?php $total_after_fee = $total + Session::get('fee'); ?>
                      </b>
                      @endif
                      </div>
                      <div>
                        @if(Session::get('coupon'))
                      <b>
                        
                          @foreach(Session::get('coupon') as $key => $cou)
                            @if($cou['coupon_condition']==1)
                               Mã giảm {{$cou['coupon_number']}}%
                              <p>
                                @php 
                                $totalCoupon = ($total*$cou['coupon_number'])/100;
                               
                                $total_after_coupon = $total - $totalCoupon;
                                @endphp
                              </p>
                              
                            @elseif($cou['coupon_condition']==2)
                            <p >Mã giảm {{number_format($cou['coupon_number'],0,',','.')}}K</p>
                              <p>
                                @php 
                                $total_after_coupon = $total - $cou['coupon_number'];
                         
                                @endphp
                              </p>
                              
                            @endif
                          @endforeach
                      </b>
                      @endif
                      </div>
                      <div>
                        <b>
                        Thanh Toán: 
                        @php 
                          if(Session::get('fee') && !Session::get('coupon')){
                            $total_after = $total_after_fee;
                            echo number_format($total_after,0,',','.').'đ';
                          }elseif(!Session::get('fee') && Session::get('coupon')){
                            $total_after = $total_after_coupon;
                            echo number_format($total_after,0,',','.').'đ';
                          }elseif(Session::get('fee') && Session::get('coupon')){
                            $total_after = $total_after_coupon;
                            $total_after = $total_after + Session::get('fee');
                            echo number_format($total_after,0,',','.').'đ';
                          }elseif(!Session::get('fee') && !Session::get('coupon')){
                            $total_after = $total;
                            echo number_format($total_after,0,',','.').'đ';
                          }

                        @endphp
                      </b>
                      </div>
                      
                    </ul>
                  </td>
                  
                </tr>
                @endif
              </tbody>
            </form>
            </table>
          
      </div>
        <div class="payment-options">
            <form action="{{URL::to('checkout-by')}}" method="post">
                {{csrf_field()}}
                <span>
                    <label><input name="payment_option" type="checkbox"> Thanh toán sau khi nhận</label>
                </span>
                <div class=" text-lg font-semibold"><button type="submit" class="btn btn-danger btn-sm">Checkout</button></div>
            </form>
        </div>

    </div>
</section>
@endsection