<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myplayers</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registerplayer.css') }}">
</head>
<body>
    <h1>選手登録</h1>
    <form action="{{ route('players.confirm') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="uniform_number">背番号</label>
        @if(isset($inputs))
            <input type="text" maxlength="3" name="uniform_number" id="uniform_number" pattern="^[0-9]+$" placeholder="3桁まで設定できます" value="{{ $inputs['uniform_number'] }}" required><br>
        @else
        <input type="text" maxlength="3" name="uniform_number" id="uniform_number" pattern="^[0-9]+$" placeholder="3桁まで設定できます" required><br>
        @endif

        <label for="player_name">選手名</label>
        @if(isset($inputs))
            <input type="text" name="player_name" id="player_name" placeholder="野球 太郎" value="{{ $inputs['player_name'] }}" required><br>
        @else
            <input type="text" name="player_name" id="player_name" placeholder="野球 太郎"required><br>
        @endif

        <label for="profile_image">プロフィール画像</label>
        <input type="file" name="profile_image" id="profile_image"><br>

        <label for="position">ポジション</label>
        <select name="position" id="position" required>
            <option value="内野手">内野手</option>
            <option value="外野手">外野手</option>
            <option value="投手">投手</option>
            <option value="捕手">捕手</option>
        </select><br>

        <a href="{{ route("myplayers") }}" class=>選手一覧へ戻る</a>
        <button type="submit" name="register" value="true">確認</button>
    </form>
</body>
</html>