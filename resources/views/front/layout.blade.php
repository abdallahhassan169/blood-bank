<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('front/imgs/logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
    <!--bootstrap file css-->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}">
    <!--google-font-->
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&display=swap" rel="stylesheet">
    <!--main file css-->
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <title>بنك الدم</title>
</head>

<body>
    <!--Loading Page-->
    <div class="loading-page">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!--header section-->
    <section class="header">
        <!--top-bar-->
        <div class="top-bar py-2">
            <div class="container">
                <!--row of top-bar-->
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="" class="ar px-1">عربى</a>
                        <a href="" class="en px-1">EN</a>
                    </div>
                    <div>
                        <ul class="list-unstyled">
                            <li class="d-inline-block mx-2"><a class="facebook" href=""><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li class="d-inline-block mx-2"><a class="insta" href=""><i
                                        class="fab fa-instagram"></i></a></li>
                            <li class="d-inline-block mx-2"><a class="twitter" href=""><i
                                        class="fab fa-twitter"></i></a></li>
                            <li class="d-inline-block mx-2"><a class="whatsapp" href=""><i
                                        class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                    <div class="connect">
                        <div class="dropdown">
                            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span>@if(auth()->guard('clients')->user()){{auth()->guard('clients')->user()->name}} @endif مرحبا بك </span> &nbsp; &nbsp;
                            </a>
                            <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{route('/')}}">  <i class="fas fa-home ml-2"></i>الرئيسيه</a>
                              <a class="dropdown-item" href="{{route('my_info')}}"> <i class="fas fa-user-alt ml-2"></i>معلوماتى</a>
                              <a class="dropdown-item" href="{{route('settings')}}"> <i class="fas fa-bell ml-2"></i>اعدادات الاشعارات</a>
                              <a class="dropdown-item" href="{{route('favorites')}}"> <i class="far fa-heart ml-2"></i>المفضلة</a>
                                <a class="dropdown-item" href="{{route('contact')}}"> <i class="fas fa-phone ml-2"></i>تواصل معنا</a>
                                <a class="dropdown-item" href="{{route('loggedout')}}"> <i class="fas fa-sign-out-alt ml-2"></i>خروج</a>
                            </div>
                          </div>
                    </div>
                </div>
                <!--End row-->
            </div>
            <!--End container-->
        </div>
        <!--End top-bar-->
        <!--navbar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{asset('front/imgs/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('/')}}">الرئيسيه <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about_bank')}}">عن بنك الدم</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('donation_create')}}">انشاء طلب</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{route('articles')}}">المقالات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories')}}">الاقسام</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('donations')}}">طلبات التبرع</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about_us')}}">من نحن</a>
                        </li>
                        <li class="nav-item cont">
                            <a class="nav-link" href="{{route('contact')}}">اتصل بنا</a>
                        </li>
                        <li class="mr-lg-auto py-md-2"><a class="signin" href="{{route('signup')}}">انشاء حساب جديد</a></li>
                        <li class="pr-3"><a class="btn bg px-3" href="{{route('signin')}}">دخول</a></li>
                    </ul>
                </div>
            </div>
            <!--End container-->
        </nav>
        <!--End Nav-->
        <!--main-header-->
        @yield('content')
        <footer>
            <div class="main-footer py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('front/imgs/logo.png')}}" alt="">
                            <h5 class="my-3">بنك الدم</h5>
                            <p class="pl-4"> هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                                هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                                العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صورة حقيقة
                                لتطبيق
                                الموقع
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="px-md-5 mt-md-3">الرئيسية</h6>
                            <ul class="list-unstyled">
                                <li class="py-2"><a href="{{route('about_bank')}}">عن بنك الدم</a></li>
                                <li class="py-2"><a href="{{route('articles')}}">المقالات</a></li>
                                <li class="py-2"><a href="{{route('donation')}}">عن التبرع</a></li>
                                <li class="py-2"><a href="{{route('about_us')}}">من نحن</a></li>
                                <li class="py-2"><a href="{{route('contact')}}">اتصل بنا</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 available">
                            <h6 class="mb-5 mt-md-3 px-md-5">متوفر على</h6>
                            <div class="my-3"><img src="{{asset('front/imgs/google1.png')}}" alt=""></div>
                            <div class="my-3"><img src="{{asset('front/imgs/ios1.png')}}" alt=""></div>
                        </div>
                    </div>
                </div>
                <!--End container-->
            </div>
            <!--End main-footer-->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="list-unstyled pt-sm-3 py-md-3">
                                <li class="d-inline-block mx-2"><a class="facebook" href=""><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="d-inline-block mx-2"><a class="insta" href=""><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="d-inline-block mx-2"><a class="twitter" href=""><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="d-inline-block mx-2"><a class="whatsapp" href=""><i
                                            class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-md-7">
                            <p class="mx-5 py-md-3">Abdallah Hassan جميع الحقوق محفوظه لـ <span>بنك الدم</span> &copy; 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Footer-->
        <!--scrollUp-->
        <div class="scrollUp">
        <i class="fas fa-chevron-up"></i>
      </div>
        <!--jquery/bootstrap/main file js-->
        <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('front/js/slick.min.js')}}"></script>
        <script src="{{asset('front/js/popper.min.js')}}"></script>
        <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('front/js/main.js')}}"></script>
        <script src="{{asset('front/js/favorite.js')}}"></script>

      </body>

      </html>
