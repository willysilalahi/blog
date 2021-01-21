@extends('templates_admin.main')

@section('title', 'Data User')
@section('heading', 'Data User')

@section('content')
    <div class="row">
        <div class="col-md-8">

            <a href="#" id="btnAddUserModal" class="btn btn-info mb-3">Tambah
                User</a>
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
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $r => $c)
                        <tr>
                            <td>{{ $r + $user->firstitem() }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->email }}</td>
                            <td>
                                @if ($c->role)
                                    <div class="badge badge-sm badge-warning">Admin</div>
                                @else
                                    <div class="badge badge-sm badge-success">Author</div>

                                @endif
                            </td>
                            <td>
                                <a href="javaScript:void(0)" data-id="{{ $c->id }}"
                                    class="btn btn-primary btn-sm mr-1 btnEditUserModal">Edit</a>
                                <a href="javaScript:void(0)" data-id="{{ $c->id }}" onclick="confirm('Apakah anda yakin?')"
                                    class="btn btn-danger btn-sm btnDeleteUser">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $user->links() }}

        </div>
    </div>

@endsection


<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javaScript:void(0)" id="formAddUser">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control">
                        <span class="form-text text-danger" id="nameErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control">
                        <span class="form-text text-danger" id="emailErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" class="form-control">
                            <option value="" selected disabled>--Pilih Role--</option>
                            <option value="1">Admin</option>
                            <option value="0">Author</option>
                        </select>
                        <span class="form-text text-danger" id="roleErr"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="form-text text-danger" id="passwordErr"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnStoreUser" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javaScript:void(0)" id="formEditUser">
                @csrf
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" id="btnUpdateUser" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
