@extends('templates_admin.main')

@section('title', 'Edit Post')
@section('heading', 'Edit Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="title" class="form-control @error('title')is-invalid
                                                                            @enderror" value="{{ $post->title }}">
                    @error('title')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="category_id"
                        class="form-control @error('category_id')is-invalid
                                                                                                                            ">
                        <option disabled selected>--Pilih Kategori--</option>
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}" @if ($c->id == $post->category_id)
                                selected
                        @endif
                        >{{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" id="postContentEdit" cols="60" rows="30"
                        class="form-control @error('content')is-invalid
                                                                                                                                    @enderror">{{ $post->content }}</textarea>
                    @error('content')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pilih Tag</label>
                    <select class="form-control select2" multiple="" name="tags[]">
                        @foreach ($tag as $t)
                            <option value="{{ $t->id }}" @foreach ($post->tags as $item)
                                @if ($t->id == $item->id)
                                    selected
                                @endif
                        @endforeach
                        >{{ $t->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Thumbnail</label><br>
                    <img src="{{ asset($post->image) }}" class="img-fluid img-thumbnail" width="200" alt="">
                    <input type="file" name="image" class="is-invalid">
                    @error('image')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
@endsection
