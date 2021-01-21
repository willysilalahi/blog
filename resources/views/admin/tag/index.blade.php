@extends('templates_admin.main')

@section('title', 'Data Tag')
@section('heading', 'Data Tag')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <a href="javaScript:void(0)" class="btn btn-info mb-3" onclick="openModalAdd()">Tambah Tag</a>
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
                                <a href="javaScript:void(0)" data-id="{{ $c->id }}"
                                    class="btn btn-primary btn-sm mr-1 btnEditTag">Edit</a>
                                <a href="javaScript:void(0)" onclick="confirm('Apakah anda yakin?')"
                                    class="btn btn-danger  btn-sm btnDeleteTag" data-id="{{ $c->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tag->links() }}

        </div>
    </div>

@endsection

{{-- Modal --}}
<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Tag</label>
                    <input type="text" id="name" name="name" class="form-control">
                    <span class="form-text text-danger" id="nameError"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="storeData()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" onclick="updateData()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
