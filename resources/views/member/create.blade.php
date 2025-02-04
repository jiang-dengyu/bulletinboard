<!-- resources/views/member/create.blade.php -->
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>新增使用者</title>
</head>
<body>
    <h1>新增使用者</h1>
    <form action="{{ route('member.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">姓名：</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="birthdate">生日日期：</label>
            <input type="date" name="birthdate" id="birthdate">
        </div>
        <div>
            <label for="birthtime">生日時間：</label>
            <input type="time" name="birthtime" id="birthtime">
        </div>
        <div>
            <label for="phone">電話：</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="address">地址：</label>
            <input type="text" name="address" id="address">
        </div>
        <div>
            <label for="email">Email：</label>
            <input type="email" name="email" id="email">
        </div>
        <button type="submit">送出</button>
    </form>
</body>
</html>