@extends('templates_admin.main')

@section('title', 'Tambah Data Tag')
@section('heading', 'Tambah Data Tag')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('tag.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nama Tag</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid
                                    @enderror">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block">Tambah</button>
            </form>
        </div>
    </div>
@endsection
