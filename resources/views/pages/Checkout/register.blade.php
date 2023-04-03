@extends('layout')
@section('register')
<div class=" relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <img src="https://printgo.vn/uploads/media/772948/thiet-ke-logo-my-pham-10_1584438206.jpg" class="h-30 w-auto text-gray-700 sm:h-20">
            <i class="justify-center pt-4 font-semibold text-danger" ><b>THIÊN ĐƯỜNG LÀM ĐẸP</b></i>
        </div>
        <form action="{{URL::to('add-customer')}}" class="pt-2" method="POST">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Tên khách hàng</label>
                    <input type="text" name="customer_name" class="form-control" id="inputName" placeholder="Họ tên khách hàng">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="customer_email" class="form-control" id="inputEmail4" placeholder="examp@gmail.com">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="customer_password" class="form-control" id="inputPassword4">
                </div>
                <div class="form-row">
                        <label for="inputnumber">Telephone</label>
                        <input type="text" name="customer_phone" class="form-control" id="inputnumber" placeholder="0978 978 789">
                </div>
            </div>
                
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        Check me out
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Register</button>
        </form>
    </div>
</div>
@endsection