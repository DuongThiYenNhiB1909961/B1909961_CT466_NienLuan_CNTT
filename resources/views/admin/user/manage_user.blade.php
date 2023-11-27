@extends('admin_layout')
@section('manage_order')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt Kê Thành viên
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
              <th></th>
              <th>Tên người dùng</th>
              <th>Email</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Mặt khẩu đăng nhập</th>
              <th>Hình ảnh (nếu có)</th>
              <th>Khách hàng VIP</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 1;  
            @endphp
            @foreach ($all_user as $key => $user)
            
               <tr>
              <td>{{$i}}</td>
              <td>{{$user->customer_name}}</td>
             
              <td>{{$user->customer_email}}</td>
              <td>{{$user->customer_address}}</td>
              <td>{{$user->customer_phone}}</td>
              <td>{{$user->customer_password}}</td>
              <td>
                @if($user->customer_picture)
                    <img src="{{$user->customer_picture}}" alt="" width="50px" height="50px">
                @else
                    <img src="{{asset('/public/uploads/product/user1.png')}}" alt="" width="50px" height="50px">
                @endif
              </td>
              <td>
                @if($user->customer_vip ==1)
                  <p>VIP</p>
                @else
                  <p>Thường</p>
                @endif
              </td>
              <td>
                <a onclick="return confirm('Bạn có chắc sắn muốn xóa người dùng này không?')" href="{{asset('/delete-user/'.$user->customer_id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i></a>
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