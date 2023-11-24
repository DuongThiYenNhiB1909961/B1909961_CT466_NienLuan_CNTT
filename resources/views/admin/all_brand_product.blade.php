@extends('admin_layout')
@section('all_brand_product')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê xuất xứ mỹ phẩm
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
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Nơi xuất xứ</th>
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_brand_product as $key => $cate_pro)
               <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$cate_pro->brand_name}}</td>
              <td><span class="text-ellipsis">
              <?php
              if($cate_pro->brand_status==0){
                ?>
                <a href="{{URL::to('/unactive-brand-product/'.$cate_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-toggle-on"></span></a>
                <?php
                }else{
                ?>
                    <a href="{{URL::to('/active-brand-product/'.$cate_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-toggle-off"></span></a>
                <?php
                }
              ?>  
              </span></td>
              <td>
                <a href="{{URL::to('/edit-brand-product/'.$cate_pro->brand_id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-pencil-square text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc sắn muốn xóa nó không?')" href="{{URL::to('/delete-brand-product/'.$cate_pro->brand_id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr> 
            @endforeach
            
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
@endsection