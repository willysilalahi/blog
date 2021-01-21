@extends('templates_admin.main')

@section('title', 'Data Post Dihapus')
@section('heading', 'Data Post Dihapus')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (count($post) > 0)
                <table class="table table-striped table-hover table-sm table-bordered w-70 table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 5%" class="text-center">No</th>
                            <th style="width: 20%">Judul</th>
                            <th style="width: 20%">Konten</th>
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
                                <td>{{ Str::limit($c->content, 30) }}</td>
                                <td>{{ $c->category->name }}</td>
                                <td>{{ $c->users->name }}</td>
                                <td>
                                    @foreach ($c->tags as $tag)
                                        <span class="badge badge-pill mb-1 badge-dark">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td><img src="{{ asset($c->image) }}" class="img-fluid img-thumbnail" width="120"></td>
                                <td>
                                    <form action="{{ route('post.kill', $c->id) }}" method="POST" class="form-inline">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('post.restore', $c->id) }}" class="btn btn-info btn-sm mr-1"
                                            onclick="confirm('Apakah anda yakin?')">Restore</a>
                                        <button type="submit" onclick="confirm('Apakah anda yakin?')"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $post->links() }}
            @else
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-info-circle"></i> <strong>Oops !</strong> Data post yang dihapus tidak ada.
                </div>
            @endif

        </div>
    </div>

@endsection
