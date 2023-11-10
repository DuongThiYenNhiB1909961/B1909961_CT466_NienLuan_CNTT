@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-danger">
    <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{asset('/show-cart-ajax')}}">Giỏ hàng</a></li>
    <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">Thanh toán</li>
  </ol>
</nav>
<style>
  .shipping.order-message{
    padding-left: 2px;
  }
</style>
<section id="cart_items">
  
    <div class="container">
        <?php
                    $customer_id = Session::get('customer_id');
                    $customer_name = Session::get('customer_name');
                    if($customer_id != NULL)
                    {
                ?>
                <div class="register-req text-danger">
                    <p>Vui lòng kiểm tra thông tin để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
                </div>
                <?php
                    }else{
                ?>
                <div class="register-req text-danger">
                    <p>Vui lòng đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
                </div>
                <?php
                }
                ?>

        <div class="shopper-informations">
          <div class="shadow pl-2 pt-2 pb-2">
            <form>
    @csrf
              <div class="bill-to">
                  <h4><b class="text-danger">Thông tin mua hàng</b> </h4>
                  <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-4 col-form-label">Tên Người Nhận</label>
                      <div class="col-sm-5">
                        <input type="text" data-validation="length" data-validation-length="min3" 
                        data-validation-error-msg="Vui lòng dien it nhat 3 ky tu" name="shipping_name" class="shipping_name shadow form-control" id="inputName" value="{{Session::get('customer_name')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-4 col-form-label">Email Người Nhận</label>
                      <div class="col-sm-5">
                        <input type="email" data-validation="length" data-validation-length="min3" 
                        data-validation-error-msg="Vui lòng dien it nhat 3 ky tu" name="shipping_email" class="shipping_email form-control shadow" id="inputEmail4" value="{{Session::get('customer_email')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-4 col-form-label">Địa Chỉ Nhận Hàng</label>
                      <div class="col-sm-5">
                        <input type="text" data-validation="length" data-validation-length="min10" 
                        data-validation-error-msg="Vui lòng dien it nhat 10 ky tu" name="shipping_address" class="shipping_address form-control shadow" id="inputEmail4" value="{{Session::get('customer_address')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-4 col-form-label">Số Điện Thoại</label>
                      <div class="col-sm-5">
                        <input type="tel" name="shipping_phone" class="shipping_phone form-control shadow" id="inputnumber" value="0{{Session::get('customer_phone')}}" required
                        pattern="[0-9]{3}[0-9]{3}[0-9]{4}"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-4 col-form-label">Ghi chú</label>
                      <div class="col-sm-5">
                        <input type="text" data-validation="length" data-validation-length="min3" 
                        data-validation-error-msg="Vui lòng dien it nhat 3 ky tu" name="shipping_note" class="shipping_note form-control shadow" id="inputEmail4">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-4 col-form-label">Chọn hình thức thanh toán</label>
                      <div class="col-sm-5">
                        <label for="exampleInputPassword1"><b></b></label>
                          <select name="payment_select"  class="form-controll input-sm m-bot15 payment_select shadow">
                            <option value="">--Chọn hình thức thanh toán--</option>
                            <option selected value="0">Thanh Toán Khi Nhận Hàng</option>
                            <option value="1">Ngân Hàng</option>   
                          </select>
                      </div>
                    </div>
                    
{{-- </form> --}}
                    @if(Session::get('fee'))
                      <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                    @else 
                      <input type="hidden" name="order_fee" class="order_fee" value="30000">
                    @endif

                    @if(Session::get('coupon'))
                      @foreach(Session::get('coupon') as $key => $cou)
                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                      @endforeach
                    @else 
                      <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                    @endif
              </div>   
          </div>
          <div class="order-message shadow pl-2 pt-2 pb-2 mt-2">
            <h4><b class="text-danger ">Địa chỉ vận chuyển</b></h4>
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label">Chọn Thành Phố</label>
                <div class="col-sm-5">
                  <select name="city" id="city" class="shadow form-control input-sm m-bot15 choose city">
                  
                          <option value="">--Chọn tỉnh thành phố--</option>
                      @foreach($city as $key => $tp)
                          <option value="{{$tp->matp}}">{{$tp->name_city}}</option>
                      @endforeach
                          
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label">Chọn Quận Huyện</label>
                <div class="col-sm-5">
                  <select name="district" id="district" class="shadow form-control input-sm m-bot15 choose district">
                          <option value="">--Chọn quận huyện--</option>

                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label">Chọn Xã Phường</label>
                <div class="col-sm-5">
                  <select name="wards" id="wards" class="shadow form-control input-sm m-bot15 wards">
                        <option value="">--Chọn xã phường--</option>   
                  </select>
                </div>
              </div>           
              <div class="delivery">
                <center>
                  <input type="submit" value="Tính Phí" name="fee_feeship" class="btn btn-danger btn-sm fee_feeship">
                </center>
                
              </div>
          </div>
        </div>
                <h4 class="text-danger text-center"><b>XEM LẠI GIỎ HÀNG</b></h4> 			
                <?php
                    $message = Session::get('message');
                    $error = Session::get('error');
                    if($message){
                      echo '<b class="text-success">'.$message.'</b>';
                      Session::put('message',null);
                    }else{
                      echo '<b class="text-danger">'.$error.'</b>';
                      Session::put('error',null);
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light rounded-lg">
                        <thead >
                          <tr class="bg-warning text-white ">
                            <th colspan="5">Xem lại giỏ hàng</th>
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
                            
                            <th class="cart_image">
                              <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" height="100" width="100" alt="{{$cart['product_image']}}">
                            </th>
                            <th class="cart_name">{{$cart['product_name']}}</th>
                            <th class="cart_price">
                              <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                            </th>
                            <th class="cart_qty">
                              <p class="text-center">{{$cart['product_qty']}}</p>
                            </th>
                            <th class="cart_total">
                              <p class="text-danger">
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
                                @if(Session::get('coupon'))
                                <b>
                                  
                                    @foreach(Session::get('coupon') as $key => $cou)
                                      @if($cou['coupon_condition']==1)
                                         
                                        <p>
                                          @php 
                                          $totalCoupon = ($total*$cou['coupon_number'])/100;
                                         
                                          $total_after_coupon = $total - $totalCoupon;
                                          @endphp
                                        </p>
                                        Mã giảm {{$cou['coupon_number']}}%: {{number_format($totalCoupon,0,',','.')}}đ
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
                                @if(Session::get('fee'))
                                <b>Phí Vận Chuyển 
                                  <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span>
                                  <a class="btn btn-default" href="{{url('/del-fee')}}"><b class="text-danger">X</b></a>
                                  <?php $total_after_fee = $total + Session::get('fee'); ?>
                                </b>
                                @elseif(!Session::get('fee'))
                                <b>Phí Vận Chuyển 
                                  <span>{{number_format(35000,0,',','.')}}đ</span>
                                  <a class="btn btn-default" href="{{url('/del-fee')}}"><b class="text-danger">X</b></a>
                                  <?php $total_after_fee = $total + 35000; ?>
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
                                      $total_after = $total_after + Session::get('fee',35000);
                                      echo number_format($total_after,0,',','.').'đ';
                                    }elseif(Session::get('fee') && Session::get('coupon')){
                                      $total_after = $total_after_coupon;
                                      $total_after = $total_after + Session::get('fee');
                                      echo number_format($total_after,0,',','.').'đ';
                                    }elseif(!Session::get('fee') && !Session::get('coupon')){
                                      $total_after = $total + Session::get('fee',35000);
                                      echo number_format($total_after,0,',','.').'đ';
                                    }

                                  @endphp
                                </b>
                                </div>
                                <div class="col-md-12">
                                  @php
                                    $toUSD = $total_after/24305;
                                  @endphp
                                  <div id="paypal-button"></div>
                                  <input type="hidden" id="toUSD" value="{{round($toUSD,2)}}">
                                </div>
                              </ul>
                            </td>
                            
                          </tr>
                          @else
                          <tr>
                            <th colspan="5">
                              <center>
                                @php
                                echo 'Vui lòng thêm sản phẩm vào giỏ hàng';
                              @endphp
                              </center>
                              
                            </th>
                            
                          </tr>
                          @endif
                        </tbody>
                      
                      </table>
                      
                </div>
        </div>
        <?php
        $customer_id = Session::get('customer_id');
        $cart = Session::get('cart');
        if(($customer_id != NULL) && ($cart != NULL))
        {
        ?>
        <div class="delivery">
          <center>
            <input type="button" value="Xác nhận" name="send_order" class="btn btn-danger btn-sm mt-1 send_order">
          </center>
          
        </div>
        
        <?php
            }else{
        ?>
        <div class="delivery">
          <center>
            <p class="btn btn-danger">Vui lòng thêm SP vào giỏ hàng để đặt hàng</p>
          </center>
          
        </div>
        <?php
        }
        ?>  
    </div>
  </form>
</section>
@endsection