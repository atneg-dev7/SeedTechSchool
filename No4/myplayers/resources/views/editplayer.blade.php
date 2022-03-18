<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myplayers</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editplayer.css') }}">
</head>
<body>
    <h1>選手編集</h1>
    <form action="{{ route("players.confirm") }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="uniform_number">背番号</label>
        <input type="text" maxlength="3" name="uniform_number" id="uniform_number" pattern="^[0-9]+$" placeholder="3桁まで設定できます" value="{{ $player['uniform_number'] }}" required><br>

        <label for="player_name">選手名</label>
        <input type="text" name="player_name" id="player_name" placeholder="野球 太郎" value="{{ $player['player_name'] }}" required><br>

        <label for="profile_image">プロフィール画像</label>
        <input type="file" name="profile_image" id="profile_image"><br>

        <label for="position">ポジション</label>
        <select name="position" id="position" required>
            <option hidden>選択してください</option>
            <option value="内野手">内野手</option>
            <option value="外野手">外野手</option>
            <option value="投手">投手</option>
            <option value="捕手">捕手</option>
        </select><br>

        <a href="{{ route('players.detail', $player->id) }}" class=>選手詳細へ戻る</a>
        <input type="hidden" name="id" id="id" value="{{ $player['id'] }}">
        <button type="submit" name="edit" value="true">確認</button>
    </form>
</body>
</html>