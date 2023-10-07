@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <?php
                    $customer_id = Session::get('customer_id');
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
            
                
                    <div class="row">
                        <div class="col-sm-6 shadow">
                            <form action="{{URL::to('save-checkout')}}" class="pt-2" method="post">
                                {{csrf_field()}}
                            <div class="bill-to">
                                <h4><b class="text-danger">Thông tin mua hàng</b> </h4>
                                <div class="form-one">
                                    
                                        <div class="form-row">
                                            <label for="inputEmail4"><b>Tên khách hàng</b> </label>
                                            <input type="text" data-validation="length" data-validation-length="min3" 
                                            data-validation-error-msg="Lam on dien it nhat 3 ky tu" name="shipping_name" class=" shadow form-control" id="inputName" placeholder="Họ tên khách hàng" required>
                                            <label for="inputEmail4"><b>Email khách hàng</b></label>
                                            <input type="email" data-validation="length" data-validation-length="min3" 
                                            data-validation-error-msg="Lam on dien it nhat 3 ky tu" name="shipping_email" class="form-control shadow" id="inputEmail4" placeholder="examp@gmail.com" required>
                                            <label for="inputEmail4"><b>Địa chỉ khách hàng</b></label>
                                            <input type="text" data-validation="length" data-validation-length="min10" 
                                            data-validation-error-msg="Lam on dien it nhat 10 ky tu" name="shipping_address" class="form-control shadow" id="inputEmail4" placeholder="Đường 3/2, phường XK, quận NK, tp Cần Thơ">
                                            <label for="inputEmail4"><b>Số điện thoại</b></label>
                                            <input type="tel" name="shipping_phone" class="form-control shadow" id="inputnumber" placeholder="0978 978 789" required
                                            pattern="[0-9]{3}[0-9]{3}[0-9]{4}"/>
                                            <label for="inputEmail4"><b>Ghi chú đơn hàng</b></label>
                                            <input type="text" data-validation="length" data-validation-length="min3" 
                                            data-validation-error-msg="Lam on dien it nhat 3 ky tu" name="shipping_note" class=" shadow form-control" placeholder="Ghi chú của khách hàng" required>
                                            <?php
                                            $customer_id = Session::get('customer_id');
                                            if($customer_id != NULL)
                                            {
                                        ?>
                                        <input type="submit" value="Xác nhận" name="send_order" class="btn btn-danger btn-sm mt-1">
                                        <?php
                                            }else{
                                        ?>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg>
                                                <div class=" text-lg font-semibold"><a class="nav-link " href="{{URL::to('/login-checkout')}}">Login</a></div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                
                                        </div>
                                </div>
                                
                            </div>
                        </form>    
                    </div>
                    <div class="col-sm-6 shadow">
                        <div class="order-message">
                            <h4><b class="text-danger ">Địa chỉ vận chuyển</b></h4>
                            <form class="pt-2">
                                @csrf 
                         
                            <div class="form-group">
                                <label for="exampleInputPassword1"><b>Chọn thành phố</b></label>
                                  <select name="city" id="city" class="shadow form-control input-sm m-bot15 choose city">
                                
                                        <option value="">--Chọn tỉnh thành phố--</option>
                                    @foreach($city as $key => $tp)
                                        <option value="{{$tp->matp}}">{{$tp->name_city}}</option>
                                    @endforeach
                                        
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><b>Chọn quận huyện</b></label>
                                  <select name="district" id="district" class="shadow form-control input-sm m-bot15 choose district">
                                        <option value="">--Chọn quận huyện--</option>

                                </select>
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1"><b>Chọn xã phường</b></label>
                                  <select name="wards" id="wards" class="shadow form-control input-sm m-bot15 wards">
                                        <option value="">--Chọn xã phường--</option>   
                                </select>
                              </div>
                           <div class="delivery">
                            <button type="button" name="fee_feeship" class="btn btn-danger btn-sm fee_feeship">Tính phí vận chuyển</button>
                           </div>
                            
                            </form>
                  
                        </div>
                    </div>    	
                </div>
                	
                <h4 class="text-danger text-center"><b>XEM LẠI GIỎ HÀNG</b></h4> 			
                <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<b class="text-danger">'.$message.'</b>';
                    Session::put('message',null);
                }
                ?>
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
                                  <b>Thuế <span></span></b>
                                </div>
                                <div>
                                  @if(Session::get('fee'))
                                <b>Phí Vận Chuyển 
                                  <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span>
                                  <a class="btn btn-default" href="{{url('/del-fee')}}"><b class="text-danger">X</b></a>
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
                      </form>
                      @if(Session::get('cart'))
                      <tr>
                        <td colspan="6">
                          <form method="POST" action="{{url('/check-coupon')}}">
                            @csrf
                              <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
                              <input type="submit" class="btn btn-default check_coupon text-danger" name="check_coupon" value="Duyệt mã">
                              @if(Session::get('coupon'))
                                <a class="btn btn-default check_out text-danger" href="{{url('/del-coupon')}}"><b>Xóa mã khuyến mãi</b></a>
                                              @endif         
                          </form>
                        </td>
                      </tr>
                      @endif
                      </table>
                    {{-- <div class="row">
                        <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                            
                            </ul>

                            <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-danger bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            </svg>
                            <div class=" text-lg font-semibold"><a class="text-danger nav-link" href="{{('/checkout')}}"><b>Checkout</b> </a></div>
                            </div>
                            
                        </div>

                        
                        </div>
                        
                    </div> --}}
                </div>
        </div>
    </div>
</section>
@endsection