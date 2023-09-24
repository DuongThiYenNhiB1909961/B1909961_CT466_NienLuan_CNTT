@extends('layout')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5 class="text-danger text-center"><b>GIỎ HÀNG</b></h5> 
      </div>
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
              <th>
                <a href="{{asset('/del-all-product')}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-danger bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg></a>
              </th>
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
                <input type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" min="1">
              </th>
                
              <th class="cart_total">
                <p>
                  {{number_format($subtotal,0,',','.')}}đ
                </p>
              </th>
              <th class="cart_delete">
                <a href="{{asset('/del-product/'.$cart['session_id'])}}" class="cart_quantity_delete" ui-toggle-class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-danger bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                      </svg></a>
              </th>
            </tr> 

            @endforeach
            <tr>
              <th>
                <input type="submit" name="update_qty" class="btn btn-default btn-sm" value="Cập nhật giỏ hàng"> 
              </th>
              {{-- <th> 
                <a href="{{('deleta_all')}}">Xóa tất cả sản phẩm</a>
              </th> --}}
              <th>
                <ul>
                  <li>Tổng tiền hàng<span>{{number_format($total,0,',','.')}}đ</span></li>
                  <li>Thuế <span></span></li>
                  <li>Phí Vận Chuyển <span></span></li>
                  <li>Tổng tiền phải thanh toán <span>{{number_format($total,0,',','.')}}đ</span></li>
                </ul>
                  
                  <th>
                    <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-danger bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                      </svg>
                      <div class=" text-lg font-semibold"><a class="text-danger nav-link" href="{{asset('/checkout')}}"><b>Checkout</b> </a></div>
                    </div>
                    <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-danger bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                      </svg>
                      <div class=" text-lg font-semibold"><a class="text-danger nav-link" href="{{('/')}}"><b>Mã giảm giá</b> </a></div>
                    </div>
                  </th>
              </th>
            </tr>
            @else
            <tr>
              <th colspan="6">
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
@endsection