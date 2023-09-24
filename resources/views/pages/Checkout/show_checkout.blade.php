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
            
                <form action="{{URL::to('save-checkout')}}" class="pt-2" method="post">
                                {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-6 shadow">
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
                        <div class="col-sm-6 shadow">
                                <div class="order-message">
                                    <h4><b class="text-danger "> Ghi chú đơn hàng</b></h4>
                                    {{-- <input type="text" name="shipping_note" class="form-control" id="inputEmail4" rows="14" placeholder="Ghi chú đơn hàng của bạn"> --}}
                                    <textarea type="text" class="shadow" name="shipping_note" placeholder="Ghi chú đơn hàng của bạn" rows="12" columns="20" required></textarea>
                                    {{-- <input type="text" data-validation="length" data-validation-length="min3" 
                                            data-validation-error-msg="Lam on dien it nhat 3 ky tu" name="shipping_note" class=" shadow form-control" placeholder="Ghi chú của khách hàng" required> --}}
                                </div>
                        </div>	
                    </div>
                </form>	
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
                        <th class="cart_quantity text-center">
                            <p>{{$cart['product_qty']}}</p>
                        </th>
                            
                        <th class="cart_total">
                            <p>
                            {{number_format($subtotal,0,',','.')}}đ
                            </p>
                        </th>
                        </tr> 

                        @endforeach
                        <tr>
                        <th>
                            <ul>
                            <li>Tổng tiền hàng<span>{{number_format($total,0,',','.')}}đ</span></li>
                            <li>Thuế <span></span></li>
                            <li>Phí Vận Chuyển <span></span></li>
                            <li>Tổng tiền phải thanh toán <span>{{number_format($total,0,',','.')}}đ</span></li>
                            </ul>
                        </th>
                        </tr>
                        
                        @endif
                    </tbody>
                    </form>
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