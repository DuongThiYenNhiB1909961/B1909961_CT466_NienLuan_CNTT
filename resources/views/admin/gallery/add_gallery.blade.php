@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thư viện ảnh
                </header>
                    <div class="position-center">
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<b class="text-danger">'.$message.'</b>';
                                Session::put('message',null);
                            }
                        ?>
                    </div>
                
                <form action="{{asset('/insert-gallery/'.$pro_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3" align="right">

                        </div>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                            <span id="error_gallery"></span>
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" name="upload" name="taianh" value="Tải lên" class="btn btn-success">
                        </div>
                    </div>
                </form>
                <div class="panel-body">
                    <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
                    <form>
                        @csrf
                        <div id="gallery_load">
                            
                        </div>
                    </form>
                    
                </div>
            </section>

    </div>
@endsection