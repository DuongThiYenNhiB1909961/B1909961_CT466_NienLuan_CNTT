@extends('layout')
@section('contact')
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
            
                <form action="{{URL::to('save-checkout')}}" class="pt-2" method="post">
                                {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="bill-to">
                                <h4><b class="text-danger">Thông tin mua hàng</b> </h4>
                                <div class="form-one">
                                    
                                        <div class="form-row">
                                            <label for="inputEmail4"><b>Tên khách hàng</b> </label>
                                            <input type="text" name="shipping_name" class="form-control" id="inputName" placeholder="Họ tên khách hàng">
                                            <label for="inputEmail4"><b>Email khách hàng</b></label>
                                            <input type="email" name="shipping_email" class="form-control" id="inputEmail4" placeholder="examp@gmail.com">
                                            <label for="inputEmail4"><b>Địa chỉ khách hàng</b></label>
                                            <input type="text" name="shipping_address" class="form-control" id="inputEmail4" placeholder="Đường 3/2, phường XK, quận NK, tp Cần Thơ">
                                            <label for="inputEmail4"><b>Số điện thoại</b></label>
                                            <input type="number" name="shipping_phone" class="form-control" id="inputnumber" placeholder="0978 978 789">
                                            <?php
                                            $customer_id = Session::get('customer_id');
                                            if($customer_id != NULL)
                                            {
                                        ?>
                                        <input type="submit" value="Gửi" name="send_order" class="btn btn-danger btn-sm mt-1">
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
                        </div>
                        <div class="col-sm-6">
                                <div class="order-message">
                                    <h4><b class="text-danger "> Ghi chú đơn hàng</b></h4>
                                    {{-- <input type="text" name="shipping_note" class="form-control" id="inputEmail4" rows="14" placeholder="Ghi chú đơn hàng của bạn"> --}}
                                    <textarea name="shipping_note" placeholder="Ghi chú đơn hàng của bạn" rows="12" columns="14" ></textarea>
                                </div>
                        </div>	
                    </div>
                </form>	
                <h4 class="text-danger text-center"><b>XEM LẠI GIỎ HÀNG</b></h4> 			
                <div class="table-responsive">
                    <?php
                        $content = Cart::content();
                        
                    ?>
                    <table class="table table-striped b-t b-light rounded-lg">
                      <thead >
                        <tr class="bg-warning text-white ">
                          <th>Tên mỹ phẩm</th>
                          <th>Hình ảnh</th>
                          <th>Giá</th>
                          <th>Số lượng</th>
                          <th>Tổng tiền</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($content as $v_content)
                           <tr>
                          <td class="cart_name">{{$v_content->name}}</td>
                          <td><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" height="100" width="100"></td>
                          <td class="cart_price">{{number_format($v_content->price).'đ'}}</td>
                          <td class="cart_quantity">
                                <input class="cart_quantity_input" type="number" name="cart_quantity" value="{{$v_content->qty}}" min="1" max="10">
                        </td>
                            
                          <td class="cart_total">
                            <p>
                                <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal).'đ';
                                ?>
                            </p>
                          </td>
                    
                        </tr> 
                        @endforeach
                        
                      </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <div class="row bg-warning rounded-lg text-white">
                              <div class="col-sm-6"><b>Tổng số lượng:</b>  <span class="text-right"></span></div>
                              <div class="col-sm-6 text-right">
                                <span>{{Cart::count() }} cái</span>
                              </div>
                            </div>
                            <div class="row bg-warning rounded-lg mt-1 text-white">
                                <div class="col-sm-6"><b>Tổng thanh toán:</b>  <span class="text-right"></span></div>
                                <div class="col-sm-6 text-right"><span>{{Cart::total().'đ'}}</span></div>
                            </div>
                            <div class="row bg-warning rounded-lg mt-1 text-white">
                                <div class="col-sm-6"><b>Thuế:</b> <span class="text-right"></span></div>
                                <div class="col-sm-6 text-right"><span>{{Cart::tax().'đ'}}</span></div>
                            </div>
                            <div class="row bg-warning rounded-lg mt-1 text-white">
                                <div class="col-sm-6"><b>Phí vận chuyển: </b><span class="text-right"></span></div>
                                <div class="col-sm-6  text-right">0đ</div>
                            </div>
                            <div class="row bg-warning rounded-lg mt-1 text-white">
                                <div class="col-sm-6"><b>Thành tiền: </b><span class="text-right"></span></div>
                                <div class="col-sm-6  text-right"><span>{{Cart::total().'đ'}}</span></div>
                            </div>
                            
                        </div>
                    </div>
                  </div>
        </div>
    </div>
</section>
@endsection