@extends('templates_admin.main')

@section('title', 'Edit Data Tag')
@section('heading', 'Edit Data Tag')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="">Nama Tag</label>
                    <input type="text" value="{{ $tag->name }}" name="name" class="form-control @error('name')is-invalid
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
