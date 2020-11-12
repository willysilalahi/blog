@extends('templates_admin.main')

@section('title', 'Tambah Post')
@section('heading', 'Tambah Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="title"
                        class="form-control @error('title')is-invalid
                                                                                                                    @enderror">
                    @error('title')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="category_id" class="form-control @error('category_id')is-invalid
                                            @enderror">
                        <option disabled selected>--Pilih Kategori--</option>
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" cols="60" rows="30" class="form-control @error('content')is-invalid
                                            @enderror"></textarea>
                    @error('content')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Select2 Multiple</label>
                    <select class="form-control select2" multiple="">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                        <option>Option 4</option>
                        <option>Option 5</option>
                        <option>Option 6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Thumbnail</label><br>
                    <input type="file" name="image" class="is-invalid">
                    @error('image')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block">Tambah</button>
            </form>
        </div>
    </div>
@endsection
