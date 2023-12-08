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
              <th>Lý do hủy đơn</th>
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
                    <span class="btn btn-warning">Chờ xác nhận</span>
                  @elseif($order->order_status == 1)
                    <span class="btn btn-info">Chờ lấy hàng</span>
                  @elseif($order->order_status == 2)
                    <span class="btn btn-success">Chờ giao hàng</span>
                  @else
                    <span class="btn btn-danger">Đã hủy đơn</span>
                  @endif
              </td>
              <td>{{$order->created_at}}</td>
              <form>
                  @csrf
              <td>
                
                @if($order->order_status == 0)
                    <p><textarea name="lydo" data-validation="length" data-validation-length="min10" 
                      data-validation-error-msg="Vui lòng dien it nhat 10 ky tu" cols="10" rows="3" placeholder="Lý do hủy đơn hàng" required></textarea></p>
                @endif
              </td>
              <td>
                @if($order->order_status == 0)
                <button type="button" id="{{$order->order_code}}" onclick="Huydon(this.id)" class="btn btn-danger">Hủy đơn</button>
                @endif
                <a href="{{asset('/history-view-order/'.$order->order_code)}}" class="active" >
                    <input type="button" class="btn btn-success" value="Chi tiết"></a>
                
              </td>
              </form>
            </tr> 
              @php
                $i++;  
              @endphp
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection