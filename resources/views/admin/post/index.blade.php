@extends('templates_admin.main')

@section('title', 'Data Post')
@section('heading', 'Data Post')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('post.create') }}" class="btn btn-info mb-3">Tambah Post</a>
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped table-hover table-sm table-bordered w-70 table-responsive">
                <thead>
                    <tr>
                        <th style="width: 5%" class="text-center">No</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Kategori</th>
                        <th>Author</th>
                        <th style="width: 15%">Tags</th>
                        <th>Thumbnail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $r => $c)
                        <tr>
                            <td class="text-center">{{ $r + $post->firstitem() }}</td>
                            <td>{{ $c->title }}</td>
                            <td>{!! Str::limit($c->content, 30) !!}</td>
                            <td>{{ $c->category->name }}</td>
                            <td>
                                {{ $c->users->name }}
                            </td>
                            <td>
                                @foreach ($c->tags as $tag)
                                    <span class="badge badge-pill mb-1 badge-info">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td><img src="{{ asset($c->image) }}" class="img-fluid img-thumbnail" width="120"></td>
                            <td>
                                <form action="{{ route('post.destroy', $c->id) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('post.edit', $c->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                    <button type="submit" onclick="confirm('Apakah anda yakin?')"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $post->links() }}

        </div>
    </div>

@endsection
