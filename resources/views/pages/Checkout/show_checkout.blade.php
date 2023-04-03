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
                                    <h4><b class="text-danger"> Ghi chú đơn hàng</b></h4>
                                    <textarea name="shipping_note" placeholder="Ghi chú đơn hàng của bạn" rows="14" columns="14" ></textarea>
                                </div>
                        </div>	
                    </div>
                </form>				
            
        </div>
    </div>
</section>
@endsection