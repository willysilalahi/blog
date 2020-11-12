@extends('templates_admin.main')

@section('title', 'Edit Data Kategori')
@section('heading', 'Edit Data Kategori')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input type="text" value="{{ $category->name }}" name="name" class="form-control @error('name')is-invalid
                                                @enderror">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
@endsection
