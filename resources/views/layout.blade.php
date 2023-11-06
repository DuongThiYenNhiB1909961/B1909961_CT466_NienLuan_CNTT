<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{$meta_desc}}" >
        <meta name="keywords" content="{{$meta_keywords}}" >
        <meta name="robots" content="INDEX,FOLLOW"/>
        <link rel="canonical" href="{{$url_canonical}}">
        <meta name="author" content="" >
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <title>{{$meta_title}}</title>
        <link rel="icon" href="https://cdn01.beelancer.vn/blog/wp-content/uploads/2021/07/Maquillaje-Nina-Maquillaje-Nina-Nina-Pintada-A-Mano-Ojos-De-Nina-PNG-y-PSD-para-Descargar-Gratis-_-Pngtree.jpg" type="image/x-icon">
        
        <link rel="stylesheet" href="{{asset('resources/css/style.css')}}">
        <link href="{{asset('resources/css/style-responsive.css')}}" rel="stylesheet"/>
        <link href="{{asset('resources/css/font-awesome.css')}}" rel="stylesheet"/>
        <link href="{{asset('resources/css/font-awesome.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('resources/css/animate.css')}}" rel="stylesheet"/>
        <link href="{{asset('resources/css/lightslider.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('resources/css/sweetalert.css')}}"> 
        <link type="text/css" rel="stylesheet" href="{{asset('resources/css/lightgallery.min.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('resources/css/prettify.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
        <!-- Fonts -->
        <link href="{{asset('https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap')}}" rel="stylesheet">
        <!-- Styles -->
        <style>
           html{line-height:1.15;-webkit-text-size-adjust:100%}
           body{margin:0}
           a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased container">
    <div class="row ">
        <div class="brand col-sm-2 text-center">
            <a href="index" class="logo text-danger ">
                Business
            </a>
        </div>
        <!-- Example single danger button -->
        <div class="col-sm-10">
            <ul class="nav justify-content-end">
                
                <?php
                    $customer_id = Session::get('customer_id');
                    $shipping_id = Session::get('shipping_id');
                    if($customer_id != NULL && $shipping_id == NULL)
                    {
                ?>
                <li class="nav-item">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                          </svg>
                        <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('/checkout')}}"><b>Checkout</b></a></div>
                    </div>
                </li>
                <?php
                    }else if($customer_id != NULL && $shipping_id != NULL){
                ?>
                <li class="nav-item">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                          </svg>
                          <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('/pill')}}"><b>Checkout</b></a></div>
                    </div>
                </li>
                <?php
                    }else {
                ?>
                <li class="nav-item">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                          </svg>
                          <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('/login-checkout')}}"><b>Checkout</b></a></div>
                    </div>
                </li>
                <?php
                }
                ?>
                
            <li class="nav-item">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                    <div class=" text-lg font-semibold"><a class="nav-link  text-danger" href="{{asset('/show-cart-ajax')}}"><b>Cart</b></a></div>
                </div>
            </li>
            
                <?php
                    $customer_id = Session::get('customer_id');
                    if($customer_id != NULL)
                    {
                ?>
                <li class="nav-item">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                          </svg>
                        <div class=" text-lg font-semibold"><a class="nav-link  text-danger" href="{{asset('/logout')}}"><b>Logout</b></a></div>
                    </div>
                    <img width="15%" src="{{Session::get('customer_picture')}}"><b class="text-danger">{{Session::get('customer_name')}}</b> 
                </li>
                <?php
                    }else{
                ?>
                <li class="nav-item">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg>
                            <div class=" text-lg font-semibold"><a class="nav-link  text-danger" href="{{asset('/login-checkout')}}"><b>Login</b></a></div>
                    </div>
                </li>
                <?php
                }
                ?>
              </ul>
        </div>
    </div>
        <header class=" row">
            <nav class="shadow navbar navbar-expand-lg navbar-light bg-light col-sm-8">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-house-check-fill" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                            <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                          </svg>
                          <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('index')}}"><b>Home </b></a></div>
                        </div>
                    </li>
                    <li class="nav-item ml-2">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
                                <path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v13.5zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
                              </svg>
                              <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('introduce')}}"><b>Introduce</b> </a></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown ml-2">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-caret-down-square-fill" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 4a.5.5 0 0 0-.374.832l4 4.5a.5.5 0 0 0 .748 0l4-4.5A.5.5 0 0 0 12 6H4z"/>
                              </svg>
                            <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('product')}}">
                                <b>Products</b></a></div>
                            </div>
                    </li>
                    <li class="nav-item ml-2">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warning bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                              </svg>
                              <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{asset('contact')}}"><b>Contact</b></a></div>
                            </div>
                    </li>
                    {{-- @foreach($category as $key => $cate)
                    <li class="nav-item ml-2">
                        <div class="flex items-center">
                            
                            <div >
                                <h6 class="panel-title color-text mr-2 " ><a class="text-decoration-none"><b></b></a></h6>
                            </div>
                            
                              <div class=" text-lg font-semibold"><a class="nav-link text-danger" href="{{URL::to('category/'.$cate->category_id)}}"><b>{{$cate->category_name}}</b></a></div>
                            </div>
                    </li>
                    @endforeach --}}
                  </ul>
                </div>
            </nav>
                <div class="shadow col-sm-4 bg-light" >
                <form action="{{asset('/search')}}" method="POST">
                    {{csrf_field()}}
                        <div class="input-group" style="margin-top: 10px">
                            <input type="text" type="text" id="keywords" name="keywords_submit" class="form-control search" placeholder="Search">
                            <div id="search-ajax"></div>
                            <span class="input-group-btn">
                            <input class="btn btn-sm btn-danger" type="submit" value="Search!" style="margin-top: 4px">
                            </span>
                        </div>
                        
                </form>
                </div>
                
            
        </header>
                {{-- <div class="row" >
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        {{-- <label for="amount"><b>Sắp Xếp Theo</b></label> --}}
                        {{-- <form action="">
                            @csrf
                            <select name="sort" id="sort" class="form-control" style="border: 2px soild #000">
                                <option value="{{Request::url()}}?sort_by=none"><i class="fa fa-filter" aria-hidden="true">--Lọc theo--</i></option>
                                <option value="{{Request::url()}}?sort_by=tang_dan">--Giá tăng dần--</option>
                                <option value="{{Request::url()}}?sort_by=giam_dan">--Giá giảm dần--</option>
                                <option value="{{Request::url()}}?sort_by=az">--Lọc theo tên A đến Z--</option>
                                <option value="{{Request::url()}}?sort_by=za">--Lọc theo tên Z đến A--</option>
                            </select>
                        </form>
                    </div>
                </div>  --}}
        @yield('content')
        
        @yield('introduce')
        @yield('login')
        @yield('register')
        @yield('product')
        <footer class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
                    <div class="rounded">
                        <div class="row">
                            <div class="col text-center m-2">
                                <div style="font-size: 2em" class=" text-danger font-semibold"><b>CONTACT US</b></div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="row ">
                                <div class="col-sm">
                                    <i class="text-danger"><b>Online</b></i>
                                    <p>Email: thienduonglamdep2023@gmail.com</p>
                                    <p>Facebook: ThienDuongLamDep2023</p>
                                    <p>Zalo: 0969787889-ThienDuongLamDep2023</p>
                                    <i class="text-danger"><b>Address</b></i>
                                    <p>Shop 1: Số 123, đường Nguyễn Văn Cừ, phường An Khánh, quận Ninh Kiều, tp Cần Thơ</p>
                                </div>
                                
                                <div class="col-sm">
                                    <i class="text-danger"><b>Map</b></i>
                                    <p>Thời gian mở cửa từ 9h đến 22h các ngày trong tuần</p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0 pt-2">
                            <i><b>Mọi ý kiến góp ý xin gửi về theo địa chỉ email thienduonglamdep2023@gmail.com</b></i>
                        </div>
                    </div>
                </div>
                </div>
            </div>  
            
        </footer>
        {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
        {{-- <script src="{{asset('resources/js/sweetalert.min.js')}}"></script> --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script src="{{asset('resources/js/lightslider.js')}}"></script>
        <script src="{{asset('resources/js/lightgallery-all.min.js')}}"></script>
        <script src="{{asset('resources/js/prettify.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <!-- Messenger Plugin chat Code -->
        <div id="fb-root"></div>

        <!-- Your Plugin chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "116662988206640");
        chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v18.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <script>
            $(document).ready(function(){
                $( "#slider-range" ).slider({
                    orientation: "horizontal",
                    range: true,

                    min: {{$min_price}},
                    max: {{$max_add}},
                    values: [ {{$min_price}}, {{$max_price}} ],
                    step: 10000,
                    slide: function( event, ui ){
                        $( "#amount" ).val( "vnđ " + ui.values[ 0 ] + " - vnđ " + ui.values[ 1 ] );
                        $( "#start_price" ).val(ui.values[ 0 ]);
                        $( "#end_price" ).val(ui.values[ 1 ] );
                    }
                });
                $( "#amount" ).val( "vnđ " + $( "#slider-range" ).slider( "values", 0 ) +
                    " - vnđ " + $( "#slider-range" ).slider( "values", 1 ) );
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#imageGallery').lightSlider({
                    gallery:true,
                    item:1,
                    loop:true,
                    thumbItem:3,
                    slideMargin:0,
                    enableDrag: false,
                    currentPagerPosition:'center',
                    onSliderLoad: function(el) {
                        el.lightGallery({
                            selector: '#imageGallery .lslide'
                        });
                    }   
                });  
            });
        </script>
        <script>
            $(document).ready(function(){
                $('#sort').on('change',function(){
                    var url = $(this).val();
                    // alert (url);
                    if(url){
                        window.location = url;
                    }else{
                        return false;
                    }
                    
                });
            });
        </script>
        <script>
            function remove_background(product_id){
                for(var count = 1; count <= 5; count++){
                    $('#'+product_id+'-' +count).css('color','#ccc');
                }
            }
            $(document).on('mouseenter','.rating',function(){
                var index = $(this).data("index");
                var product_id = $(this).data('product_id');
                remove_background(product_id);
                for(var count = 1; count <= index; count++){
                    $('#'+product_id+'-' +count).css('color','#ffcc00');
                }
            });
            $(document).on('mouseleave','.rating',function(){
                var index = $(this).data("index");
                var product_id = $(this).data('product_id');
                var rating = $(this).data("rating");
                remove_background(product_id);
                for(var count = 1; count <= rating; count++){
                    $('#'+product_id+'-' +count).css('color','#ffcc00');
                }
            });
            $(document).on('click','.rating',function(){
                var index = $(this).data("index");
                var product_id = $(this).data('product_id');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                        url: '{{url('/add-rating')}}',
                        method: 'POST',
                        data:{
                            index:index,
                            product_id:product_id,
                            _token:_token},
                        success:function(data){
                            if(data == 'done'){
                                swal("Good job!", "Bạn đã đánh giá "+index+" trên 5 sao. Hãy viết bình luận của bạn về sản phẩm", "success");
                                
                            }
                            else{
                                alert("Lỗi đánh giá");
                            }
                        } 

                    }); 
            });
        </script>
        <script>
            $(document).ready(function(){
                load_comment()
                
                function load_comment(){
                    var product_id = $('.comment_product_id').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/load-cmt')}}',
                        method: 'POST',
                        data:{
                            product_id:product_id,
                            _token:_token},
                        success:function(data){
                            
                            $('#load_comment').html(data);
                        } 

                    }); 
                }
                $('.send_cmt').click(function(){
                    
                    var product_id = $('.comment_product_id').val();
                    var comment_name = $('.comment_name').val();
                    var comment_content = $('.comment_content').val();
                    var _token = $('input[name="_token"]').val();
                    
                    $.ajax({
                        url: '{{url('/send-cmt')}}',
                        method: 'POST',
                        data:{
                            product_id:product_id,
                            comment_name:comment_name,
                            comment_content:comment_content,
                            _token:_token},
                        success:function(data){
                            
                            $('#status').html('<span class="text text-success">Chờ duyệt bình luận</span>');
                            load_comment();
                            $('#status').fadeOut(5000);
                            $('.comment_content').val('');
                            swal("Good job!", "Cảm ơn bạn đã bình luận", "success");
                        } 

                    }); 
                })
            })
        </script>
        <script>
            $('#keywords').keyup(function(){
                var query = $(this).val();
                if(query != ''){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/auto-ajax')}}',
                        method: 'POST',
                        data:{
                            query:query,
                            _token:_token},
                        success:function(data){
                            $('#search-ajax').fadeIn();
                            $('#search-ajax').html(data);
                        } 

                    });
                }else{
                    $('#search-ajax').fadeOut();
                }
            });
            $(document).on('click','li',function(){
                $('#keywords').val($(this).text());
                $('#search-ajax').fadeOut();
            })
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                // swal("Good job!", "You clicked the button!", "success")
                var id = $(this).data('id');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_qty = $('.cart_product_pty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
                    alert('Vui lòng chọn sản phẩm nhỏ hơn ' + cart_product_quantity);
                }else
                    {
                        $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{
                            cart_product_id:cart_product_id,
                            cart_product_name:cart_product_name,
                            cart_product_image:cart_product_image,
                            cart_product_price:cart_product_price,
                            cart_product_quantity:cart_product_quantity,
                            cart_product_qty:cart_product_qty,
                            _token:_token},
                        success:function(data){
                            swal("Good job!", "Đã thêm sản phẩm vào giỏ hàng", "success");
                        } 

                        });
                    }
                
            });
        });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                
                if(action=='city'){
                    result = 'district';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery-checkout')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                       $('#'+result).html(data);     
                    }
                });
            }); 
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.fee_feeship').on('click',function(){
                    var matp = $('.city').val();
                    var maqh = $('.district').val();
                    var xaid = $('.wards').val();
                    var _token = $('input[name="_token"]').val();
                    if(matp == '' || maqh == '' || xaid == ''){
                        alert('Vui lòng chọn đầy đủ địa chỉ cần vận chuyển');
                    }else{
                    $.ajax({
                        url : '{{url('/fee-feeship')}}',
                        method: 'POST',
                        data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                        success:function(data){
                            location.reload();      
                        }
                    });
                }
                }); 
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.send_order').click(function(){
                    
                    var shipping_name = $('.shipping_name').val();
                    var shipping_email = $('.shipping_email').val();
                    var shipping_address = $('.shipping_address').val();
                    var shipping_phone = $('.shipping_phone').val();
                    var shipping_note = $('.shipping_note').val();
                    var shipping_method = $('.payment_select').val();
                    var order_fee = $('.order_fee').val();
                    var order_coupon = $('.order_coupon').val();
                    var _token = $('input[name="_token"]').val();
                    if(shipping_name == '' || shipping_email == '' || shipping_address == '' || shipping_phone == '' || shipping_note == ''
                    || shipping_method == ''){
                        alert('Vui lòng điền đầy đủ thông tin nhận hàng');
                    }else{
                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{
                                shipping_name:shipping_name,
                                shipping_email:shipping_email,
                                shipping_address:shipping_address,
                                shipping_phone:shipping_phone,
                                shipping_note:shipping_note,
                                order_fee:order_fee,
                                order_coupon:order_coupon,
                                shipping_method:shipping_method,
                                _token:_token},
                                success:function(data){
                                    swal("Good job!", "Đặt hàng thành công", "success");
                                }
                        });
                        window.setTimeout(function(){ 
                            location.reload();
                        } ,3000);
                    }
                    
                });
            });
        </script>
    </body>
</html>