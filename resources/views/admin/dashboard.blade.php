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

    </div>
    <div class="row">

    </div>
</div>
@endsection