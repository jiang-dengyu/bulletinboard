@extends('layouts.app')

@section('title', 'SFTP Test')

@section('content')
    <div class="container">
        <h1>SFTP 測試</h1>
        <p>請選擇一個檔案進行上傳測試：</p>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('sftp.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
            <button type="submit" class="btn">上傳</button>
        </form>
    </div>
@endsection
