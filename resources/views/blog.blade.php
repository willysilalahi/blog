@extends('template_blog.main')

@section('title', 'Blog - Pundi Mas Berjaya')
@section('main')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div id="hot-post" class="row hot-post">
                <div class="col-md-8 hot-post-left">
                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('single.post', $rnd_post[0]->slug) }}"><img
                                src="{{ asset($rnd_post[0]->image) }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a
                                    href="{{ route('blog.categories', Str::slug($rnd_post[0]->category->name)) }}">{{ $rnd_post[0]->category->name }}</a>
                            </div>
                            <h3 class="post-title title-lg"><a
                                    href="{{ route('single.post', $rnd_post[0]->slug) }}">{{ $rnd_post[0]->title }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ $rnd_post[0]->users->name }}</a></li>
                                <li>{{ $rnd_post[0]->created_at->format('d, M Y') }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                <div class="col-md-4 hot-post-right">
                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('single.post', $rnd_post[1]->slug) }}"><img
                                src="{{ asset($rnd_post[1]->image) }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a
                                    href="{{ route('blog.categories', Str::slug($rnd_post[1]->category->name)) }}">{{ $rnd_post[1]->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a
                                    href="{{ route('single.post', $rnd_post[1]->slug) }}">{{ $rnd_post[1]->title }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">{{ $rnd_post[1]->users->name }}</a></li>
                                <li>{{ $rnd_post[1]->created_at->format('d, M Y') }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('single.post', $rnd_post[2]->slug) }}"><img
                                src="{{ asset($rnd_post[2]->image) }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a
                                    href="{{ route('blog.categories', Str::slug($rnd_post[2]->category->name)) }}">{{ $rnd_post[2]->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a
                                    href="{{ route('single.post', $rnd_post[2]->slug) }}">{{ $rnd_post[2]->title }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">{{ $rnd_post[2]->users->name }}</a></li>
                                <li>{{ $rnd_post[2]->created_at->format('d, M Y') }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

@endsection

@section('content')
    <div class="col-md-8">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Blog Terbaru</h2>
                </div>
            </div>

            @foreach ($data as $i)
                <!-- post -->
                <div class="col-md-6">
                    <div class="post">
                        <a class="post-img" href="{{ route('single.post', $i->slug) }}"><img src="{{ $i->image }}"
                                alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">{{ $i->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="{{ route('single.post', $i->slug) }}">{{ $i->title }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ $i->users->name }}</a></li>
                                <li>{{ $i->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /post -->
            @endforeach


        </div>
        <!-- /row -->

    </div>
@endsection
