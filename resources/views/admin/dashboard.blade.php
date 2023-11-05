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
                <p>Từ ngày: </p><input type="text" id="datepicker" placeholder="2023-10-20" class="form-control">
                <input type="button" id="dashboard_filter" class="btn btn-danger btn-sm " value="Lọc">
            </div> 
            <div class="col-md-2">
                <p>Đến ngày: </p><input type="text" id="datepicker1" placeholder="2023-10-22" class="form-control">
                
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
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <p class="title_statistic">Thống Kê Tổng sản phẩm đơn hàng</p>
            <div id="donut"></div>
        </div>
        <div class="col-md-4 col-xs-12">
            <h3>sản phẩm</h3>
            <ol class="list-views">

            </ol>
        </div>
        <div class="col-md-4 col-xs-12">
            
        </div>
    </div>
</div>
@endsection