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
  /* .footer_checkout{
    Position: fixed;
    Z-index: 1;
    background: #000;
    padding-top: 80%;
} */
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
                  <h5 class="mt-2"><b>Thông Tin Mua Hàng</b> </h5><hr>
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
                        <input type="tel" name="shipping_phone" class="shipping_phone form-control shadow" id="inputnumber" value="{{Session::get('customer_phone')}}" required
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
                    <h5 class="mt-2"><b>Phương Thức Thanh Toán</b></h5><hr>
                    <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-4 col-form-label">Chọn hình thức thanh toán</label>
                      <div class="col-sm-5">
                        <label for="exampleInputPassword1"><b></b></label>
                          <select name="payment_select"  class="form-controll input-sm m-bot15 payment_select shadow">
                            <option value="">--Chọn hình thức thanh toán--</option>
                            <option selected value="0">Thanh Toán Khi Nhận Hàng</option>
                            <option value="1">Thanh Toán Qua VNPay</option>   
                            <option value="2">Thanh Toán Qua PayPal</option>   
                          </select>
                      </div>
                    </div>        
                    <div class="delivery">
                      <center>
                        <input type="submit" value="Tính Phí" name="fee_feeship" class="btn btn-danger btn-sm fee_feeship">
                      </center>
                      
                    </div>                  

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
</form></div>
        <div class="order-message shadow pl-2 pt-2 pb-2 mt-2">
          <h6>MÃ KHUYẾN MÃI/MÃ QUÀ TẶNG</h6><hr>
          <div style="background-color: rgb(241, 216, 216); padding: 10px; width: 70%;" class="rounded">
            @if(Session::get('cart'))
            
              <td colspan="2">
                <form method="POST" action="{{url('/checkCoupon')}}">
                  @csrf
                  <div class="input-group" style="margin-top: 13px">
                    <p class="mt-1">Mã KM/Quà tặng </p>
                    <input type="text" id="keywords" name="coupon" class="form-control rounded coupon" placeholder="Mã KM">
                    <span class="input-group-btn">
                      <input type="submit" value="Áp dụng" name="check_coupon" class="btn btn-info btn-sm check_coupon">
                      {{-- <input type="submit" class="btn btn-sm btn-info check_coupon text-white" name="check_coupon"  value="Áp dụng" style="margin-top: 4px"> --}}
                    </span>
                      @if(Session::get('coupon'))
                        <a class="btn btn-default check_out text-danger" href="{{url('/del-coupon')}}"><b>Xóa mã khuyến mãi</b></a>
                      @endif  
                    <br>
                    
                  </div>
                  <i style="font-size: 15px; padding: 25%" class="text-danger">*Chỉ áp dụng được 1 mã khuyến mãi</i>
                  
                </form>
              </td>
            @endif
          </div>
        </div>
        <div  class="text-danger">
          <center><b>MÃ GIẢ GIÁ</b></center> 
        </div>
        <style>
          .coupon{
            border: 2px solid #35dccb;
            margin: 2px 0 2px;
            border-top-right-radius: 25%;
            border-bottom-left-radius: 25%;
          }
          .date{
            border: 2px solid #dc3554;
            border-top-right-radius: 25%;
            border-bottom-left-radius: 25%;
          }
          .font{
            font-size: 15px;
            margin-left: 17px;
          }
        </style>
            <div class="table-agile-info font">
              <div class="row panel panel-default">
               @foreach ($coupon as $key => $cou)
                   <div class="col-sm-3 coupon mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" >
                   <table class="table table-sm">
                       <thead>
                       <tr>
                           <th scope="col">{{$cou->coupon_name}}</th>
                           <div></div>
                           <div></div>
                           <div></div>
                           <th scope="col">{{$cou->coupon_date_start}}</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td scope="row">
                               Còn lại: {{$cou->coupon_time}}
                               <br>
                               <b class="text-danger">Nhập Mã Ngay</b>
                           </td>
                           <div></div>
                           <div></div>
                           <div></div>
                           <td>
                           <b class="text-danger">Code: {{$cou->coupon_code}}</b><br>
                           @if($cou->coupon_date_end >= $now)
                           <input type="button" class="text-success date" value="Còn hạn">
                           @else
                           <input type="button" class="text-danger date" value="Hết hạn">
                           @endif
           
                           </td>
                       </tr>
                       </tbody>
                   </table>
                   </div> 
                @endforeach
               
              </div>
            </div> 
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
                          <tr>
                            <th colspan="5">Kiểm tra lại đơn hàng</th>
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
                          <td colspan="2"></td>
                            <td colspan="4">
                              <ul>
                                <b><p style="float: left">Tổng tiền hàng: </p> <p class="text-right">{{number_format($total,0,',','.')}}đ</p></b>
                                
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
                                        <p style="float: left">Mã giảm {{$cou['coupon_number']}}%: </p><p class="text-right">{{number_format($totalCoupon,0,',','.')}}đ</p>
                                      @elseif($cou['coupon_condition']==2)
                                      <p style="float: left">Mã giảm: </p><p class="text-right">{{number_format($cou['coupon_number'],0,',','.')}}K</p>
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
                                <b><p style="float: left">Phí Vận Chuyển:  </p>
                                  <p class="text-right"><span>{{number_format(Session::get('fee'),0,',','.')}}đ</span></p>
                                  <?php $total_after_fee = $total + Session::get('fee'); ?>
                                </b>
                                @elseif(!Session::get('fee'))
                                <b><p style="float: left">Phí Vận Chuyển:  </p>
                                  <p class="text-right"><span>{{number_format(35000,0,',','.')}}đ</span></p>
                                  <?php $total_after_fee = $total + 35000; ?>
                                </b>
                                @endif
                                </div>
                                <div>
                                  <b><p style="float: left">Thanh Toán: </p>
                                    
                                  
                                      @if(Session::get('fee') && !Session::get('coupon'))
                                        <?php $total_after = $total_after_fee; ?>
                                        
                                        <p class="text-right">{{number_format($total_after,0,',','.')}}đ</p>
                                      @elseif(!Session::get('fee') && Session::get('coupon'))
                                        <?php $total_after = $total_after_coupon;
                                        $total_after = $total_after + Session::get('fee',35000); ?>
                                       
                                        <p class="text-right">{{number_format($total_after,0,',','.')}}đ</p> 
                                      @elseif(Session::get('fee') && Session::get('coupon'))
                                        <?php $total_after = $total_after_coupon;
                                        $total_after = $total_after + Session::get('fee'); ?>
                                        
                                        <p class="text-right">{{number_format($total_after,0,',','.')}}đ</p> 
                                      @elseif(!Session::get('fee') && !Session::get('coupon'))
                                        <?php $total_after = $total + Session::get('fee',35000); ?>
                                        
                                        <p class="text-right">{{number_format($total_after,0,',','.')}}đ</p> 
                                      
                                      @endif
                                    
                                  </b>
                                </div>
                                <div>
                                  @if(Session::get('payment_select')==0)
                                    <p >(Thanh toán khi nhận hàng)</p>
                                  @elseif(Session::get('payment_select')==1)
                                    <p>(Thanh toán qua VNPay)</p>
                                  @elseif(Session::get('payment_select')==2)
                                    <p>(Thanh toán qua PayPal)</p>
                                  @endif
                                </div>
                                <div class="col-md-12">
                                  <?php
                                  $customer_id = Session::get('customer_id');
                                  $cart = Session::get('cart');
                                  if(($customer_id != NULL) && ($cart != NULL))
                                  {
                                  ?>
                                  <div class="delivery">
                                    @if(Session::get('payment_select')==0)
                                      <form >
                                        @csrf
                                        @if(Session::get('fee'))
                                          <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                                        @else 
                                          <input type="hidden" name="order_fee" class="order_fee" value="35000">
                                        @endif
                    
                                        @if(Session::get('coupon'))
                                          @foreach(Session::get('coupon') as $key => $cou)
                                            <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                                          @endforeach
                                        @else 
                                          <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                        @endif
                                        <input type="hidden" name="totalafter" value="{{$total_after}}">
                                        <input type="button" value="Thanh Toán" name="send_order" class="btn btn-danger btn-sm mt-1 send_order">
                                      </form>
                                    @elseif(Session::get('payment_select')==1)
                                      <form action="{{url('/vnpay-checkout')}}" method="POST">
                                          @csrf
                                          
                                          <input type="hidden" name="total_vnpay" value="{{$total_after}}">
                                          <input type="button" value="Thanh Toán" name="redirect" class="vnpay btn btn-danger text-white ml-4">
                                          {{-- <i class="fa fa-credit-card text-danger" aria-hidden="true">
                                            <input type="button" value="Thanh Toán" name="" class="vnpay btn btn-warning text-danger ml-4" style="font-size: 15px; border-radius: 15px 15px 15px 15px; margin: 0; ">
                                          </i> --}}
                                      </form> 
                                    @elseif(Session::get('payment_select')==2)
                                      <form>
                                        @csrf
                                          
                                          @php
                                            $toUSD = $total_after/24305;
                                          @endphp
                                          <div id="paypal-button"></div>
                                          <input type="hidden" id="toUSD" value="{{round($toUSD,2)}}">
                                      </form>
                                    
                                    @endif
                                  </div>
                                  <?php
                                      }else{
                                  ?>
                                  <div class="delivery">
                                  </div>
                                  <?php
                                  }
                                  ?>  
                                  
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
        
    </div>
</section>
@endsection