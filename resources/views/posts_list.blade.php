@extends('template_blog.main')


@section('title', 'All Post - Pundi Mas Berjaya')


@section('content')
    <div class="col-md-8">

        @foreach ($posts as $i)
            <!-- post -->
            <div class="post post-row">
                <a class="post-img" href="{{ route('single.post', $i->slug) }}"><img src="{{ asset($i->image) }}"
                        alt=""></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="category.html">{{ $i->category->name }}</a>
                    </div>
                    <h3 class="post-title"><a href="{{ route('single.post', $i->slug) }}">{{ $i->title }}</a></h3>
                    <ul class="post-meta">
                        <li><a href="#">{{ $i->users->name }}</a></li>
                        <li>{{ $i->created_at->format('d, M Y') }}</li>
                    </ul>
                    <p>{!! Str::limit($i->content, 90) !!}</p>
                </div>
            </div>
            <!-- /post -->
        @endforeach

        <div class="row">
            <div class="col-md-12 text-center">
                {{ $posts->links() }}
            </div>
        </div>

    </div>
@endsection
