@extends('admin_layout')
@section('dashboard')
<h3  align="center"><b>Chào mừng bạn đến với Admin</b></h3>
<div>
    <style>
        p.title_statistic{
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: brown;
        }
        
    </style>
    
    <div class="row">
        <p class="title_statistic" align="center">Thống kê doanh số đơn hàng</p><hr>
        
        <form autocomplete="off">
            @csrf
            <div class="col-md-2">
                <p>Từ ngày: </p><input type="text" id="datepicker" placeholder="20-10-2023" class="form-control">
                <input type="button" id="dashboard_filter" class="btn btn-danger btn-sm " value="Lọc">
            </div> 
            <div class="col-md-2">
                <p>Đến ngày: </p><input type="text" id="datepicker1" placeholder="22-10-2023" class="form-control">
                
            </div> 
            <div class="col-md-2">
                <p>
                    Lọc theo:
                    <select class="dashboard_filter_option form-control">
                        <option>--Chọn--</option>
                        <option value="7ngay">7 ngày qua</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="365ngayqua">365 ngày qua</option>
                    </select>
                </p>
                
            </div> 
            <div class="col-md-12">
                <div id="mychart" style="height: 250px;"></div>
            </div>
        </form>
    </div>
    <div class="row">
        <style>
            table.table.table-bordered.table-dark{
                background: #32383e;
            }
            table.table.table-bordered.table-dark tr th{
                color: #ffffff;
            }
        </style>
        <p class="title_statistic">Thống Kê Lượt Truy Cập</p>
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">Đang online</th>
                    <th scope="col">Tổng tháng trước</th>
                    <th scope="col">Tổng tháng này</th>
                    <th scope="col">Tổng một năm</th>
                    <th scope="col">Tổng truy cập</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$visitor_count}}</td>
                    <td>{{$visitor_last_month_count}}</td>
                    <td>{{$visitor_this_month_count}}</td>
                    <td>{{$visitor_year_count}}</td>
                    <td>{{$visitors_total}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <div >
            <p class="title_statistic">Thống Kê Doanh Thu Theo Sản Phẩm</p>
            
        </div>
        
        <div class="table-agile-info">
            <div class="panel panel-default" >
              <div class="table-responsive" >
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
                      
                      <th>Mã mỹ phẩm</th>
                      <th>Tên</th>
                      <th>Ảnh</th>
                      <th>Danh mục</th>
                      <th>Xuất xứ</th>
                      <th>Đã bán</th>
                      <th>Tồn kho</th>
                      <th>Vốn đã nhập SP</th>
                      <th>Doanh thu</th>
                      <th>Lợi nhuận</th>
                      <th>Ngày nhập</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($all_product as $key => $pro)
                       <tr>
                      
                      <td>{{$pro->product_id}}</td>
                      <td>{{$pro->product_name}}</td>
                      
                      <td><img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100px" width="100px"></td>
                      <td>{{$pro->category_name}}</td>
                      <td>{{$pro->brand_name}}</td>
                      <td>{{$pro->product_sold}}</td>
                      <td>{{$pro->product_qty}}</td>
                      <td>{{$pro->product_price_buy*$pro->product_sold}}</td>
                      <td>{{$pro->product_price*$pro->product_sold}}</td>
                      <td>{{($pro->product_price*$pro->product_sold)-($pro->product_price_buy*$pro->product_sold)}}</td>
                      <td>{{$pro->date_add_product}}</td>
                    </tr> 
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <p class="title_statistic">Thống Kê Tổng Sản Phẩm Đơn Hàng</p>
            <div id="donut"></div>
        </div>
        <div class="col-md-8 col-xs-12">
            <b class="" style="font-size: 20px;font-weight: bold;color: brown; margin-left:20%;">Sản Phẩm Xem Nhiều</b>
            <ol class="list-views">
                @foreach($product_views as $key => $view)
                <li>
                    <a href="{{asset('/product-detail/'.$view->product_id)}}" style="display: inline-flex"><p style="color: brown;">{{$view->product_name}} | </p> <p class="text-info"> {{$view->product_views}} lượt xem</p></a>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
    
</div>
@endsection