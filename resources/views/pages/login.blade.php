@extends('layout')
@section('login')
<div class=" relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <img src="https://printgo.vn/uploads/media/772948/thiet-ke-logo-my-pham-10_1584438206.jpg" class="h-30 w-auto text-gray-700 sm:h-20">
            <i class="justify-center pt-4 font-semibold text-danger" ><b>THIÊN ĐƯỜNG LÀM ĐẸP</b></i>
        </div>
        <form class="pt-2">
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="form-group">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                    Check me out
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Login</button>
            <b><p>Nếu bạn chưa có tài khoản hãy</p><a class="nav-link " href="register">Register</a></b>
        </form>
    </div>
</div>
@endsection