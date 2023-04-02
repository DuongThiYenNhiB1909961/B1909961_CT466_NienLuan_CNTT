@extends('layout')
@section('contact')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>

        <div class="review-payment">
            <h2>Đơn hàng của bạn</h2>
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
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($content as $v_content)
                   <tr>
                  <td class="cart_name">{{$v_content->name}}</td>
                  <td><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" height="100" width="100"></td>
                  <td class="cart_price">{{number_format($v_content->price).'đ'}}</td>
                  <td class="cart_quantity">
                    <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                        {{csrf_field()}}
                        <input class="cart_quantity_input" type="number" name="cart_quantity" value="{{$v_content->qty}}" min="1" max="10">
                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                        <button type="submit" name="update_qty" class="btn btn-default btn-sm"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                            </svg>
                        </button>
                    </form>
                </td>
                    
                  <td class="cart_total">
                    <p>
                        <?php
                            $subtotal = $v_content->price * $v_content->qty;
                            echo number_format($subtotal).'đ';
                        ?>
                    </p>
                  </td>
                  <td class="cart_delete">
                    <a class="cart_quantity_delete" href=""></a>
                    <a onclick="return confirm('Bạn có chắc sắn muốn xóa nó không?')" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}" class="active" ui-toggle-class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-danger bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                          </svg></a>
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