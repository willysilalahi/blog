@extends('templates_admin.main')

@section('title', 'Data Tag')
@section('heading', 'Data Tag')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('tag.create') }}" class="btn btn-info mb-3">Tambah Tag</a>
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped table-hover table-sm table-bordered w-70">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tag as $r => $c)
                        <tr>
                            <td>{{ $r + $tag->firstitem() }}</td>
                            <td>{{ $c->name }}</td>
                            <td>
                                <form action="{{ route('tag.destroy', $c->id) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('tag.edit', $c->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                    <button type="submit" onclick="confirm('Apakah anda yakin?')"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tag->links() }}

        </div>
    </div>

@endsection
