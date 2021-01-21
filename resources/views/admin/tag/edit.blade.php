<div class="form-group">
    <label for="">Nama Tag</label>
    <input type="hidden" id="idTag" value="{{ $tag->id }}">
    <input type="text" value="{{ $tag->name }}" name="name" id="index" class="form-control">
    <span class="form-text text-danger" id="nameErrors"></span>
</div>
