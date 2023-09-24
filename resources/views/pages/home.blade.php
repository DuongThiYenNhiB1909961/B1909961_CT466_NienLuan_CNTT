@extends('layout')
@section('content')
<div class="pt-1 relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <img src="resources/images/logo.jpg" class="h-30 w-auto text-gray-700 sm:h-20">
            <i class="justify-center pt-4 font-semibold text-danger" ><b>THIÊN ĐƯỜNG LÀM ĐẸP</b></i>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide pt-2" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="height: 12cm" src="https://bizweb.dktcdn.net/100/376/405/articles/nhuong-quyen-gia-cong-my-pham-blog-coanmy-5.jpg?v=1596804339223" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Makeup</h5>
                        <p class="text-white" >Trang điểm sẽ làm cho bản thân xinh đẹp, tự tin và yêu kiều hơn.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="height: 12cm"  src="https://images.summitmedia-digital.com/preview/images/2019/10/22/serums-for-overnight-repair-nm.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block text-black">
                        <h5 class="text-white">Tinh dầu</h5>
                        <p class="text-white">Tinh dầu giúp cải thiện tình trạng da kém, làm căn bóng và mịn màn hơn.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="height: 12cm" src="https://ann.com.vn/wp-content/uploads/17027-286547389-1485387881893221-14277493048240233-n.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark">Mask</h5>
                        <p class="text-dark">Mặt nạ giúp da được cấp ẩm làm da luôn tươi tắn, căng nước.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
          
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="#" class="underline text-gray-900 dark:text-white">Da mặt</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Chăm sóc da mặt đúng cách sẽ giúp chị em sở hữu làn da khỏe mạnh, tươi sáng và chống lão hóa. Trong đó, thứ tự sử dụng các sản phẩm dưỡng da đóng vai trò quan trọng, bởi nó sẽ quyết định hiệu quả chăm sóc da.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" /></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="#" class="underline text-gray-900 dark:text-white">Body</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Một trong những “vũ khí” đặc biệt chị em nâng tầm nhan sắc chính là làn da. Bên cạnh da mặt thì chăm sóc da body đúng cách sẽ giúp chị em sở hữu làn da mịn màng sáng khỏe, tăng sự quyến rũ và sức hút với mọi người xung quanh. Và quy trình chăm sóc da body chuẩn, đầy đủ các bước dưới đây chính là những thông tin chị em đang tìm kiếm.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="#" class="underline text-gray-900 dark:text-white">Chống lão hóa</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Một trong những “vũ khí” đặc biệt chị em nâng tầm nhan sắc chính là làn da. Bên cạnh da mặt thì chăm sóc da body đúng cách sẽ giúp chị em sở hữu làn da mịn màng sáng khỏe, tăng sự quyến rũ và sức hút với mọi người xung quanh. Và quy trình chăm sóc da body chuẩn, đầy đủ các bước dưới đây chính là những thông tin chị em đang tìm kiếm.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" /></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Chăm sóc sâu</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Mùa Hè thật mời gọi với những chuyến vi vu đến nhiều vùng đất mới. Đồng nghĩa với việc làn da body cần được chăm sóc và bảo vệ toàn diện. Cùng Thiên Đường Làm Đẹp tham khảo một số cách dưỡng da body trắng mịn và khỏe mỗi ngày nhé.
                            </div>
                        </div>
                    </div>
        
        </div>
</div>
@endsection