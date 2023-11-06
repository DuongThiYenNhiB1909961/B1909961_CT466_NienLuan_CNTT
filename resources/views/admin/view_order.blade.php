@extends('admin_layout')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
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
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
             <tr>
            <td>{{$cus->customer_name}}</td>
            <td>{{$cus->customer_phone}}</td>
            <td>{{$cus->customer_email}}</td>
            <td>{{$cus->customer_picture}}</td>
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
        Thông tin vận chuyển
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

              <th style="width:30px;"></th>
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
          Thông tin chi tiết đơn hàng
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
                <th>Phí Vận Chuyển</th>
                <th>Tồn Kho</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá Bán</th>
                <th>Giá Gốc</th>
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
                <td>{{$OrDes->feeship}}</td>
                <td>{{$OrDes->product->product_qty}}</td>
                <td>{{$OrDes->product_name}}</td>
                <td>
                  {{$OrDes->product_sales_quantity}}
                  <input type="hidden" class="order_qty_{{$OrDes->product_id}}" value="{{$OrDes->product_sales_quantity}}" name="order_sales_quantity">
                  <input type="hidden" name="order_qty_inventory" class="order_qty_inventory_{{$OrDes->product_id}}" value="{{$OrDes->product->product_qty}}">
                  <input type="hidden" name="order_product_id" class="order_product_id" value="{{$OrDes->product_id}}">
                </td>
                <td>{{number_format($OrDes->product_price,0,',','.')}}vnđ</td>
                <td>{{number_format($OrDes->product->product_price_buy,0,',','.')}}vnđ</td>
                <td>{{number_format($subtotal,0,',','.')}}vnđ</td>
              </tr> 
            @endforeach 
              <tr >
                <td colspan="8" class="text-right">
                  @php
                    $total_coupon = 0;  
                  @endphp  
                  @if($coupon_condition==1)
                      @php
                        $total_after_coupon =  ($total * $coupon_number)/100;
                        echo 'Tổng giảm: '.number_format($total_after_coupon,0,',','.').'vnđ'.'</br>';
                        $total_coupon = $total + $OrDes->feeship - $total_after_coupon;
                      @endphp
                  @else
                      @php
                        echo 'Tổng giảm: '.number_format($coupon_number,0,',','.').'vnđ'.'</br>';
                        $total_coupon = $total + $OrDes->feeship - $coupon_number;
                      @endphp
                  @endif
                  <b class="text-danger">PHÍ SHIP: {{number_format($OrDes->feeship,0,',','.')}}vnđ</b>
                  <br>
                  <b class="text-danger">THANH TOÁN: {{number_format($total_coupon,0,',','.')}}vnđ</b>
                </td>
              </tr>
              <tr>
                <td colspan="5">
                  @foreach($order as $key => $or)
                    @if($or->order_status==1)
                    <form>
                      @csrf
                      <select class="form-control order_status">
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                        <option id="{{$or->order_id}}" value="2">Đã xử lý - Đã giao hàng</option>
                      </select>
                    </form>
                 @else
                    <form>
                      @csrf
                      <select class="form-control order_status">
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <option disabled id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                        <option id="{{$or->order_id}}" selected value="2">Đã xử lý - Đã giao hàng</option>
                      </select>
                    </form>

                    @endif
                  @endforeach
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection