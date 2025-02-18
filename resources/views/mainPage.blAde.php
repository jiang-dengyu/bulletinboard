@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
    <div class="container">
        <h1>Welcome to the Main Page</h1>
        <p>This page does not require any parameters.</p>
    </div>
    <form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">上傳</button>
</form>
@endsection