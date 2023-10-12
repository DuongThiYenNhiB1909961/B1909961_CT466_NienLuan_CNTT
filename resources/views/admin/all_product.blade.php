@extends('admin_layout')
@section('all_product')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê mỹ phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
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
              
              <th>Tên mỹ phẩm</th>
              <th>Từ khóa mỹ phẩm</th>
              <th>Giá mua</th>
              <th>Giá bán</th>
              <th>Giá bán thực tế</th>
              <th>Số lượng</th>
              <th>Dung tích</th>
              <th>Hình ảnh mỹ phẩm</th>
              <th>Mô tả mỹ phẩm</th>
              <th>Danh mục</th>
              <th>Xuất xứ</th>
              
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_product as $key => $pro)
               <tr>
              
              <td>{{$pro->product_name}}</td>
              <td>{{$pro->meta_keywords}}</td>
              <td>{{$pro->product_price_buy}}</td>
              <td>{{$pro->product_price}}</td>
              <td>{{$pro->product_price_real}}</td>
              <td>{{$pro->product_qty}}</td>
              <td>{{$pro->product_capacity}}</td>
              <td><img src="public/uploads/product/{{$pro->product_image}}" height="100" width="100"></td>
              <td>{{$pro->product_desc}}</td>
              <td>{{$pro->category_name}}</td>
              <td>{{$pro->brand_name}}</td>

              <td><span class="text-ellipsis">
              <?php
              if($pro->product_status==0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-toggle-on"></span></a>
                <?php
                }else{
                ?>
                    <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-toggle-off"></span></a>
                <?php
                }
              ?>  
              </span></td>
              <td>
                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-pencil-square text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc sắn muốn xóa nó không?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr> 
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