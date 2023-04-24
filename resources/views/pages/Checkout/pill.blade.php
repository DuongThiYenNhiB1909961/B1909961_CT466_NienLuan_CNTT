@extends('layout')
@section('contact')
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