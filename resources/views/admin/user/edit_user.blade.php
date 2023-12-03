@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thành viên
                </header>
                
                <div class="panel-body">
                    @foreach($edit_userad as $key => $edit_value)
                    <div class="position-center">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<b class="text-danger">'.$message.'</b>';
                        Session::put('message',null);
                    }
                ?>
                        <form role="form" action="{{URL::to('/update-userad/'.$edit_value->customer_id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">Khách hàng VIP</label>
                                <div class="col-sm-5">
                                  <label for="exampleInputPassword1"><b></b></label>
                                    <select name="customer_select"  class="form-controll input-sm m-bot15 payment_select shadow">
                                      <option value="">--Chọn loại khách hàng--</option>
                                      <option value="0">Thường</option>
                                      <option value="1">VIP</option> 
                                    </select>
                                </div>
                              </div> 
                                       
                        
                        <button type="submit" name="update_userad" class="btn btn-info">Cập nhật khách hàng</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
@endsection