@extends('admin_layout')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
    </div>
    <div>
      <p><a class="btn btn-info" href="{{asset('/send-coupon')}}">Gửi mã giảm giá cho khách hàng VIP</a></p>
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
           

            <th>Tên mã giảm</th>
            <th>Mã giảm giá</th>
            <th>Số lượng</th>
            <th>Điều kiện</th>
            <th>Số giảm</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Tình trạng</th>
            <th>Hết hạn</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>
          
            <td>{{ $cou->coupon_name }}</td>
            <td>{{ $cou->coupon_code }}</td>
            <td>{{ $cou->coupon_time }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                Giảm theo %
                <?php
                 }else{
                ?>  
                Giảm theo tiền
                <?php
               }
              ?>
            </span>
          </td>
             <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                Giảm {{$cou->coupon_number}}%
                <?php
                 }else{
                ?>  
                Giảm {{$cou->coupon_number}}k
                <?php
               }
              ?>
            </span></td>
           <td>{{$cou->coupon_date_start}}</td>
           <td>{{$cou->coupon_date_end}}</td>
           <td><span class="text-ellipsis">
            <?php
            if($cou->coupon_status==1){
              ?>
              <span class="text-danger"><b>Đã kích hoạt</b></span>
              <?php
              }else{
              ?>
                <span class="text-success"><b>Đã khóa</b></span>
              <?php
              }
            ?>  
            </span></td>
            <td>
              @if($cou->coupon_date_end >= $now)
                 <span class="text-success"><b>Còn hạn</b></span>
              @else
                <span class="text-danger"><b>Hết hạn</b></span>
              @endif
            </td>
            <td>
             
              <a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection