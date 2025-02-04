<!-- resources/views/member/index.blade.php -->
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>會員列表</title>
</head>
<body>
    <h1>會員列表</h1>

    @if(session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
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
                    <td colspan="7">目前沒有會員資料</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>