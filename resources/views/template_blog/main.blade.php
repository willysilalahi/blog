<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('public/callie/css/bootstrap.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('public/callie/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('public/callie/css/style.css') }}" />

</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <!-- NAV -->
        <div id="nav">
            <!-- Top Nav -->
            <div id="nav-top">
                <div class="container">
                    <!-- social -->
                    <ul class="nav-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <!-- /social -->

                    <!-- logo -->
                    <div class="nav-logo">
                        <a href="index.html" class="logo"><img src="{{ asset('public/callie/img/logo.png') }}"
                                alt=""></a>
                    </div>
                    <!-- /logo -->

                    <!-- search & aside toggle -->
                    <div class="nav-btns">
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                        <div id="nav-search">
                            <form method="GET" action="{{ route('search') }}">
                                <input class="input" name="keyword" placeholder="Enter your search...">
                            </form>
                            <button class="nav-close search-close">
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <!-- /search & aside toggle -->
                </div>
            </div>
            <!-- /Top Nav -->

            <!-- Main Nav -->
            <div id="nav-bottom">
                <div class="container">
                    <!-- nav -->
                    <ul class="nav-menu">
                        <li><a href="{{ url('') }}">Beranda</a></li>
                        <li><a href="{{ route('posts.list') }}">All Post</a></li>
                        @foreach ($category as $i)
                            <li><a href="{{ route('blog.categories', $i->slug) }}"> {{ $i->name }}</a></li>
                        @endforeach
                    </ul>
                    <!-- /nav -->
                </div>
            </div>
            <!-- /Main Nav -->

            <!-- Aside Nav -->
            <div id="nav-aside">
                <ul class="nav-aside-menu">
                    <li><a href="{{ url('') }}">Beranda</a></li>
                    <li><a href="{{ route('posts.list') }}">All Post</a></li>
                    @foreach ($category as $i)
                        <li><a href="{{ route('blog.categories', $i->slug) }}"> {{ $i->name }}</a></li>
                    @endforeach
                </ul>
                <button class="nav-close nav-aside-close"><span></span></button>
            </div>
            <!-- /Aside Nav -->

            @yield('page-header')
        </div>
        <!-- /NAV -->
    </header>
    <!-- /HEADER -->

    <!-- SECTION -->
    @yield('main')
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                @yield('content')
                <div class="col-md-4">
                    <!-- ad widget-->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="./img/ad-3.jpg" alt="">
                        </a>
                    </div>
                    <!-- /ad widget -->

                    <!-- social widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Social Media</h2>
                        </div>
                        <div class="social-widget">
                            <ul>
                                <li>
                                    <a href="#" class="social-facebook">
                                        <i class="fa fa-facebook"></i>
                                        <span>21.2K<br>Followers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-twitter">
                                        <i class="fa fa-twitter"></i>
                                        <span>10.2K<br>Followers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-google-plus">
                                        <i class="fa fa-google-plus"></i>
                                        <span>5K<br>Followers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /social widget -->

                    <!-- category widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Categories</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                @foreach ($category as $i)
                                    <li><a href="{{ route('blog.categories', $i->slug) }}">{{ $i->name }}
                                            <span>{{ $i->posts->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /category widget -->

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Popular Posts</h2>
                        </div>

                        @foreach ($popular_post as $i)
                            <!-- post -->
                            <div class="post post-widget">
                                <a class="post-img" href="{{ route('single.post', $i->slug) }}"><img
                                        src="{{ asset($i->image) }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="{{ route('blog.categories', $i->slug) }}"> {{ $i->name }}</a>
                                    </div>
                                    <h3 class="post-title"><a
                                            href="{{ route('single.post', $i->slug) }}">{{ $i->title }}</a></h3>
                                </div>
                            </div>
                            <!-- /post -->
                        @endforeach

                    </div>
                    <!-- /post widget -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    @include('template_blog.footer')
