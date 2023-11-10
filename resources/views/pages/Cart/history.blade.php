@extends('layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-danger">
      <li class="breadcrumb-item"><a href="{{asset('index')}}">Home</a></li>
      <li class="breadcrumb-item active" style="border: 1px solid #dc3545;" aria-current="page" >Lịch sử đơn hàng</li>
    </ol>
</nav>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading text-danger">
        <center><b>LỊCH SỬ ĐƠN HÀNG</b></center>
        
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
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 1;  
            @endphp
            @foreach ($getorder as $key => $order)
            
               <tr>
              <td>{{$i}}</td>
              <td class="text-danger">{{$order->order_code}}</td>
             
              <td class="text-danger">
                  @if($order->order_status == 0)
                      Chờ xác nhận
                  @elseif($order->order_status == 1)
                      Người bán đang soạn hàng
                  @else
                      Đã xử lý - chờ giao hàng
                  @endif
              </td>
              <td>{{$order->created_at}}</td>
              <td>
                <a href="{{asset('/history-view-order/'.$order->order_code)}}" class="active" >
                    <input type="button" class="btn btn-success" value="Chi tiết"></a>
                
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
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
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