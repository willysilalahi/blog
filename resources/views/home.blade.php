@extends('templates_admin.main')

@section('title', 'Home')
@section('heading', 'Home')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h1>Ini adalah home/Dashboard</h1>

@endsection
