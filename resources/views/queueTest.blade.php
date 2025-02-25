@extends('layouts.app')

@section('title', 'Queue Test')

@section('content')
    <div class="container mt-5">
        <h2>Laravel 佇列測試</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('queue.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">輸入 Email：</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">送出到佇列</button>
        </form>
    </div>
@endsection
