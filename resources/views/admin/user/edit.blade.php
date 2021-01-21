<div class="form-group">
    <label for="">Nama</label>
    <input type="hidden" id="id_data" value="{{ $user->id }}">
    <input type="text" value="{{ $user->name }}" name="name" class="form-control">
    <span class="form-text text-danger" id="nameEr"></span>
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
    <span class="form-text text-danger" id="emailEr"></span>
</div>
<div class="form-group">
    <label for="">Role</label>
    <select name="role" class="form-control">
        <option value="{{ $user->role }}">
        @if ($user->role) Admin @else Author

            @endif
        </option>
        <option value="1">Admin</option>
        <option value="0">Author</option>
    </select>
    <span class="form-text text-danger" id="roleEr"></span>
</div>
