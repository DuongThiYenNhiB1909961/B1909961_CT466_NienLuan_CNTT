@extends('layout')
@section('content')
<style>
  .bg{
    background-color: #C92127;
    padding-left: 25%;
  }
</style>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-danger">
    <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
    <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page">Giỏ hàng</li>
  </ol>
</nav>
  <div class="row table-agile-info">
    <div class="col-sm-9 panel panel-default">
      <div class="panel-heading ">
        <h5 class="text-danger text-center"><b>GIỎ HÀNG</b></h5> 
      </div>
      <?php
        $message = Session::get('message');
        $error = Session::get('error');
        if($message){
          echo '<b class="text-danger">'.$message.'</b>';
          Session::put('message',null);
        }else{
          echo '<b class="text-danger">'.$error.'</b>';
          Session::put('error',null);
        }
      ?>
      <div class="table-responsive">
        <form action="{{url('update-cart')}}" method="POST">
          @csrf
          {{-- {{csrf_field()}} --}}
        <table class="table table-striped b-t b-light rounded-lg">
          <thead >
            <tr class="bg-warning text-white ">
              <th>Tên</th>
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
              <td><input type="submit" value="" name="update_qty" class="check_out btn btn-default btn-sm"></td>
              <th colspan="6">
                <div class="text-right"><b class="text-danger">Tổng tiền hàng: {{number_format($total,0,',','.')}}đ</b></div>          
                @if(Session::get('coupon'))
                                <b>
                                  
                                    @foreach(Session::get('coupon') as $key => $cou)
                                      @if($cou['coupon_condition']==1)
                                      
                                         
                                        <p>
                                          @php 
                                          $totalCoupon = ($total*$cou['coupon_number'])/100;
                                         
                                          @endphp
                                        </p>
                                      <div class="text-right"><b class="text-danger">Mã giảm {{$cou['coupon_number']}}%: {{number_format($totalCoupon,0,',','.')}}đ</b></div>
                                        
                                      @elseif($cou['coupon_condition']==2)
                                      
                                        <p>
                                          @php 
                                          $total_after_coupon = $total - $cou['coupon_number'];
                                   
                                          @endphp
                                        </p>
                                      <div class="text-right"><b class="text-danger">Mã giảm {{number_format($cou['coupon_number'],0,',','.')}}K</b></div>  
                                      @endif
                                    @endforeach
                                </b>
                                @endif
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
    </div>
    <div class="col-sm-3">
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
         }
       </style>
         <div class="table-agile-info font">
             <div class="panel panel-default">
             @foreach ($coupon as $key => $cou)
                 <div class="coupon mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" >
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
                         @if(($cou->coupon_date_end >= $now) && ($cou->coupon_time >0))
                         <input type="button" class="text-success date" value="Còn hạn">
                         @else
                         <input type="button" class="text-danger date" value="Đã hết">
                         @endif
         
                         </td>
                     </tr>
                     </tbody>
                 </table>
                 </div> 
             @endforeach
             
             </div>
         </div> 
         <center>
            {{-- <button class=""> --}}
              <div class="flex items-center bg rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-white bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                </svg>
                <div class=" text-lg font-semibold"><a class="text-danger nav-link" href="{{asset('/checkout')}}"><b class="text-white">Checkout</b> </a></div>
              
              </div>
            {{-- </button> --}}
         </center>
    
    </div>
  </div>
</div>  
@endsection