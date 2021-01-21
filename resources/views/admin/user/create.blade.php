@extends('templates_admin.main')

@section('title', 'Tambah Data User')
@section('heading', 'Tambah Data User')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="" name="name" class="form-control @error('name')is-invalid
                                                            @enderror">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control @error('email')is-invalid
                                                            @enderror">
                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" class="form-control @error('role')is-invalid
                                @enderror">
                        <option value="" selected disabled>--Pilih Role--</option>
                        <option value="1">Admin</option>
                        <option value="0">Author</option>
                    </select>
                    @error('role')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control @error('password')is-invalid
                                                            @enderror">
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block">Tambah</button>
            </form>
        </div>
    </div>
@endsection
