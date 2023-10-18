@extends('admin_layout')
@section('manage_order')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê đơn hàng
      </div>
      
      <div class="table-responsive">
        <?php
            $message = Session::get('message');
            if($message){
                echo '<b class="text-danger">'.$message.'</b>';
                Session::put('message',null);
            }
        ?>
        <table class="table table-striped b-t b-light" id="myTable">
          <thead>
            <tr>
              
              <th>Đơn hàng</th>
              <th>Mã đơn</th>
              <th>Tình trạng đơn</th>
              <th>Thời gian đặt hàng</th>
              <th></th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 1;  
            @endphp
            @foreach ($all_order as $key => $order)
            
               <tr>
              <td>{{$i}}</td>
              <td>{{$order->order_code}}</td>
             
              <td>@if($order->order_status == 1)
                      Đơn hàng new
                  @else
                      Đã xử lý
                  @endif
              </td>
              <td>{{$order->created_at}}</td>
              <td>
                <a href="{{asset('/view-order/'.$order->order_code)}}" class="active" >
                    <i class="fa fa-pencil-square text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc sắn muốn xóa nó không?')" href="{{asset('/delete-order/'.$order->order_code)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i></a>
              </td>
              <td>
                <a href=""><i class="fa fa-check-circle text-success" aria-hidden="true"></i></a>
              </td>
            </tr> 
            @php
              $i++;  
            @endphp
            @endforeach
            
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection