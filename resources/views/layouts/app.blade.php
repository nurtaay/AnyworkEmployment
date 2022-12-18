<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/anywork2.svg')}}">
    <link href="{{asset('img/anywork2.svg')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{'assets/vendor/aos/aos.css'}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/styless.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Arsha - v4.9.1
    * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top " style="background: #37517e;margin-left: -50px">
    <div class="container d-flex align-items-center">
        <img src="{{asset('img/anywork2.svg')}}" alt="" style="width: 130px; height: 130px; margin-top: 20px">
        <h1 class="logo me-auto"><a href="{{asset('index.html')}}">Anywork</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('posts.index')}}">{{__('messages.Home')}}</a></li>
                <li><a class="nav-link scrollto" href="#team">{{__('messages.Team')}}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('messages.Vacancy')}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @isset($categories)
                            @foreach($categories as $cat)
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('posts.vacancy', $cat->id) }}">{{$cat->name}}</a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </li>

                <li class="nav-item">
                    @if(app()->getLocale()=='en')
                        <a class="nav-link" href="{{route('posts.allfavourite')}}">{{__('messages.My_favourite_vacancy')}}</a>
                    @elseif(app()->getLocale()=='kz')

                        <a class="nav-link" href="{{route('posts.allfavourite')}}">Таңдаулы ваканциялар</a>
                    @elseif(app()->getLocale()=='ru')
                        <a class="nav-link" href="{{route('posts.allfavourite')}}">Мой избранное ваканций</a>
                    @endif
                </li>
                <li><a class="nav-link scrollto" href="#contact">{{__('messages.Contact')}}</a></li>

                <ul class="nav-link">
                    @guest
                        @if (Route::has('login.form'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.form') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register.form'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register.form') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown">
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    🌐 {{config('app.languages')[app()->getLocale()]}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @foreach(config('app.languages') as $ln => $lang)
                                        <a class="dropdown-item" style="color:rgba(0, 106, 93, 0.8); " href="{{route('switch.lang',$ln)}}">
                                            {{$lang}}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="dropdown">
                                <a id="navbarDropdown" href="{{route('user.profile')}}" class="nav-link dropdown-toggle" role="button"
                                   data-bs-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__('messages.Profile')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
                                {{ Auth::user()->name }}
                                <a  style="color: black" class="nav-link" href="{{route('wallet.index')}}">Cash</a>
                                <a  style="color: black" class="nav-link" href="{{route('user.profile')}}">{{__('messages.Profile')}}</a>
                                <a  style="color: black" class="nav-link" href="{{route('posts.create')}}">{{__('messages.Job')}}</a>
                                <a  style="color: black" class="nav-link" href="{{route('resumes.index')}}">{{__('messages.Resumes')}}</a>
                                <a  style="color: black; width: 150px; border-radius: 10px" class="" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
                                </a>

                                    <a class="dropdown-item" style="color:rgb(236,0,6);" href="{{route('adm.users.index')}}" role="button" >
                                        {{ __('messages.adm-panel') }}
                                    </a>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

                <li><a class="getstarted scrollto" href="#about">{{__('messages.Get Started')}}</a></li>
                @auth<li style="margin-left: 10px;"><img src="@if(Auth::user() != null) {{asset(Auth::user()->avatar)}} @endif " style="width: 70px; height: 70px; border-radius: 50px" class="nav-profile-img"></li>@endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<div>
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('message') }}<strong>!</strong>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('error') }}<strong>!</strong>
        </div>
    @endif
@yield('content')
</div>

<div id=""></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'}}"></script>
<script src="{{'assets/vendor/glightbox/js/glightbox.min.js'}}"></script>
<script src="{{'assets/vendor/isotope-layout/isotope.pkgd.min.js'}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{'assets/vendor/waypoints/noframework.waypoints.js'}}"></script>
<script src="{{'assets/vendor/php-email-form/validate.js'}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
