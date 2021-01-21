@extends('template_blog.main')


@section('title', $post->title)


@section('page-header')
    <div id="post-header" class="page-header mx-auto" style="width:1138px;margin:0 auto">
        <div class="page-header-bg" style="background-image: url({{ asset($post->image) }});"
            data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        <a href="category.html">{{ $post->category->name }}</a>
                    </div>
                    <h1>{{ $post->title }}</h1>
                    <ul class="post-meta">
                        <li><a href="author.html">{{ $post->users->name }}</a></li>
                        <li>{{ $post->created_at->format('d, M Y H:i') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->
@endsection

@section('content')
    <div class="col-md-8">
        <!-- post share -->
        <div class="section-row">
            <div class="post-share">
                <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
                <a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
                <a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
                <a href="#"><i class="fa fa-envelope"></i><span>Email</span></a>
            </div>
        </div>
        <!-- /post share -->

        <!-- post content -->
        <div class="section-row">
            {!! $post->content !!}
        </div>
        <!-- /post content -->

        <!-- post tags -->
        <div class="section-row">
            <div class="post-tags">
                <ul>
                    <li>TAGS:</li>
                    @foreach ($post->tags as $i)
                        <li><a href="#">{{ $i->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /post tags -->

        <!-- post author -->
        <div class="section-row">
            <div class="section-title">
                <h3 class="title">About <a href="author.html">John Doe</a></h3>
            </div>
            <div class="author media">
                <div class="media-left">
                    <a href="author.html">
                        <img class="author-img media-object" src="{{ asset('public/callie/img/avatar-1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="media-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <ul class="author-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /post author -->

        <!-- post comments -->
        <div class="section-row">
            <div class="section-title">
                <h3 class="title">3 Comments</h3>
            </div>
            <div class="post-comments">

                <!-- comment -->
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="{{ asset('public/callie/img/avatar-2.jpg') }}" alt="">
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <h4>John Doe</h4>
                            <span class="time">5 min ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <!-- /comment -->


            </div>
        </div>
        <!-- /post comments -->

        <!-- post reply -->
        <div class="section-row">
            <div class="section-title">
                <h3 class="title">Leave a reply</h3>
            </div>
            <form class="post-reply" action="{{ route('store.post_comment') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="input" name="message" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="primary-button" type="submit">Submit</button>
                    </div>

                </div>
            </form>
        </div>
        <!-- /post reply -->
    </div>
@endsection
