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

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            
               <tr>

              <td>{{$order_by_id->customer_name}}</td>
              <td>{{$order_by_id->customer_phone}}</td>
            
            </tr> 
            
            
          </tbody>
        </table>
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

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            
               <tr>

              <td>{{$order_by_id->shipping_name}}</td>
              <td>{{$order_by_id->shipping_address}}</td>
              <td>{{$order_by_id->shipping_phone}}</td>
            
            </tr> 
            
            
          </tbody>
        </table>
      </div>
</div>
<br><br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
          Liệt kê chi tiết đơn hàng
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
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng Tiền</th>
  
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
              
                 <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$order_by_id->product_name}}</td>
                <td>{{$order_by_id->product_sales_quantity}}</td>
                <td>{{$order_by_id->product_price}}</td>
                <td>{{$order_by_id->product_price * $order_by_id->product_sales_quantity}}</td>
              </tr> 
              
              
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection