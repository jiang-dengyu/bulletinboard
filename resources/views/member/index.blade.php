@extends('layouts.app')

@section('title', '會員列表')

@section('content')
    <div class="container">
        <h1>會員列表</h1>
        
        <div class="export-links">
            <a href="{{ route('member.exportXlsxDefault') }}" class="btn">匯出 Excel - 一般格式</a>
            <a href="{{ route('member.exportXlsxGrouped') }}" class="btn">匯出 Excel - 地址合併</a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="member-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>生日日期</th>
                    <th>生日時間</th>
                    <th>電話</th>
                    <th>地址</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->birthdate }}</td>
                        <td>{{ $member->birthtime }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="no-data">目前沒有會員資料</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
