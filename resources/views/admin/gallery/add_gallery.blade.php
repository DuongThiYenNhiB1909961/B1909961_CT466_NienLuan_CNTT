@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thư viện ảnh
                    <div class="position-center">
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<b class="text-danger">'.$message.'</b>';
                                Session::put('message',null);
                            }
                        ?>
                    </div>
                </header>
                
                <div class="panel-body">
                    <input type="hidden" value="{{$pro_id}}" class="pro_id">
                    <form>
                        @csrf
                        <div id="gallery_load">
                            {{-- <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên hình ảnh</th>
                                        <th>Hình ảnh</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                </tbody>
                            </table> --}}
                        </div>
                    </form>
                    
                </div>
            </section>

    </div>
@endsection