@extends('templates_admin.main')

@section('title', 'Data Kategori')
@section('heading', 'Data Kategori')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('category.create') }}" class="btn btn-info mb-3">Tambah Kategori</a>
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
                    @foreach ($category as $r => $c)
                        <tr>
                            <td>{{ $r + $category->firstitem() }}</td>
                            <td>{{ $c->name }}</td>
                            <td>
                                <form action="{{ route('category.destroy', $c->id) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('category.edit', $c->id) }}"
                                        class="btn btn-primary btn-sm mr-1">Edit</a>
                                    <button type="submit" onclick="confirm('Apakah anda yakin?')"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $category->links() }}

        </div>
    </div>

@endsection
