@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{asset('/history')}}">Lịch sử</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page" >Lịch sử đơn hàng</li>
    </ol>
</nav>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><b class="text-danger">Thông tin khách hàng</b></center>
        
      </div>
      
      <div class="table-responsive">
        <?php
            $message = Session::get('message');
            if($message){
                echo '<b class="text-danger">'.$message.'</b>';
                Session::put('message',null);
            }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              
              <th>Tên khách hàng</th>
              <th>Số Điện Thoại</th>
              <th>Email</th>
              <th>Ảnh</th>
              
            </tr>
          </thead>
          <tbody>
            
               <tr>
              <td>{{$cus->customer_name}}</td>
              <td>{{$cus->customer_phone}}</td>
              <td>{{$cus->customer_email}}</td>
              <td><img width="15%" src="{{$cus->customer_picture}}"></td>
            </tr> 
            
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
            <center><b class="text-danger">Thông tin vận chuyển</b></center>
          
        </div>
        
        <div class="table-responsive">
          <?php
              $message = Session::get('message');
              if($message){
                  echo '<b class="text-danger">'.$message.'</b>';
                  Session::put('message',null);
              }
          ?>
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                
                <th>Tên người vận chuyển</th>
                <th>Địa chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Ghi chú</th>
                <th>Hình thức thanh toán</th>
  
              </tr>
            </thead>
            <tbody>
              
                 <tr>
  
                <td>{{$shipping->shipping_name}}</td>
                <td>{{$shipping->shipping_address}}</td>
                <td>{{$shipping->shipping_phone}}</td>
                <td>{{$shipping->shipping_email}}</td>
                <td>{{$shipping->shipping_note}}</td>
                <td>
                  @if($shipping->shipping_method == 0)
                    Thanh toán khi nhận
                  @else
                    Ngân hàng
                  @endif
                </td>
              </tr> 
              
              
            </tbody>
          </table>
        </div>
  </div>
  </div>
  <br>
  <div class="table-agile-info">
      <div class="panel panel-default">
          <div class="panel-heading">
            <center><b class="text-danger">Thông tin chi tiết đơn hàng</b></center>
            
          </div>
          
          <div class="table-responsive">
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<b class="text-danger">'.$message.'</b>';
                    Session::put('message',null);
                }
            ?>
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th> STT </th>
                  <th>Mã Giảm Giá</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Giá Bán</th>
                  <th>Tổng Tiền</th>
    
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 0;
                  $total = 0;
                  @endphp
                @foreach($order_details as $key => $OrDes)
                  @php
                  $i++;
                  $subtotal = $OrDes->product_price * $OrDes->product_sales_quantity;
                  $total += $subtotal;
                  @endphp
                   <tr class="color_qty_{{$OrDes->product_id}}">
                  <td>{{$i}}</td>
                  <td>
                    @if($OrDes->coupon != 'no')
                      {{$OrDes->coupon}}
                    @else
                      Không áp dụng mã giảm
                    @endif
                  </td>
                  <td>{{$OrDes->product_name}}</td>
                  <td>
                    {{$OrDes->product_sales_quantity}}
                  </td>
                  <td>{{number_format($OrDes->product_price,0,',','.')}}vnđ</td>
                  <td>{{number_format($subtotal,0,',','.')}}vnđ</td>
                </tr> 
                
              @endforeach 
              <tr>
                    <td colspan="6" class="bg-danger text-white" align="right"><b>Thanh toán: {{number_format($total,0,',','.')}}vnđ</b></td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
  </div>
@endsection