@extends('admin_layout')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bình luận
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
        <div id="replyy"></div>
        <thead>
          <tr>
           
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Nội dung bình luận</th>
            <th>Ngày bình luận</th>
            <th>Sản phẩm</th>
            <th>Duyệt</th>
            <th>Quản lý</th>
          
            
           
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
          @foreach($comment as $key => $cmt)
          <tr>
            @php
                $i++;
            @endphp
            <td>{{$i}}</td>
            <td>{{ $cmt->comment_name }}</td>
            <td>{{ $cmt->comment_content }}
                @if($cmt->comment_status==0)
                <form>
                    @csrf
                    <style>
                        ul.rep{
                            list-style-type: decimal;
                            color: blue;
                            margin: 3px 20px;
                        }
                        div.admin{
                            margin-left: 40px;
                        }
                    </style>
                    <p class="text-danger">Trả lời: </p>
                    <ul class="rep">
                        @foreach($comment_rep as $key => $cmt_reply)
                        @if($cmt_reply->comment_parent_cmt == $cmt->comment_id)
                        <li>{{$cmt_reply->comment_content}}</li>
                        @endif
                        
                        @endforeach
                    </ul>
                    
                    <br><textarea type="text" class="reply_content_{{$cmt->comment_id}} form-control"></textarea>
                    <button class="btn btn-danger reply_comment" data-comment_id="{{$cmt->comment_id}}" data-product_id="{{$cmt->product_id}}">Reply</button>
                </form>
                @endif 
            </td>
            <td>{{ $cmt->comment_date }}</td>
            <td>
                <img src="public/uploads/product/{{$cmt->product->product_image}}" height="100" width="100">
            </td>
            <td>
                <span class="text-ellipsis">
                    <?php
                    if($cmt->comment_status==0){
                      ?>
                      <a href="{{URL::to('/unactive-comment/'.$cmt->comment_id)}}"><span class="fa-thumb-styling fa fa-toggle-on text-success"></span></a>
                      <?php
                      }else{
                      ?>
                          <a href="{{URL::to('/active-comment/'.$cmt->comment_id)}}"><span class="fa-thumb-styling fa fa-toggle-off text-danger"></span></a>
                      <?php
                      }
                    ?>  
                </span>
            </td>
            <td>
             
              <a onclick="return confirm('Bạn có chắc là muốn xóa bình luận này ko?')" href="{{URL::to('/delete-comment/'.$cmt->comment_id)}}" class="active styling-edit" ui-toggle-class="">
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