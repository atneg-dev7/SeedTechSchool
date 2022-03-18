<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myplayers</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registerconfirmplayer.css') }}">
</head>
<body>
    <h1>選手登録確認</h1>
    @if(!empty($profile_image_path))
        <img src="{{ asset('/storage/images/'.$profile_image_path) }}" alt="">
    @else
        <div>プロフィール画像なし</div>
    @endif
    <p>{{ $inputs['uniform_number'] }}</p>
    <p>{{ $inputs['player_name'] }}</p>
    <p>{{ $inputs['position'] }}</p>
    <h3>この選手を登録しますか？</h3>

    {{-- 修正処理 --}}
    <form action="{{ route("players.modify") }}" method="post">
        @csrf
            <input type="hidden" name="uniform_number" value={{ $inputs['uniform_number'] }}>
            <input type="hidden" name="player_name" value="{{ $inputs['player_name'] }}">
            @if(array_key_exists('profile_image',$inputs))
                <input type="hidden" name="profile_image" value={{ $profile_image_path }}>
            @endif
            <input type="hidden" name="position" value={{ $inputs['position'] }}>
            <button type="submit" name="register" value="true">戻る</button>
    </form>

    {{-- 登録処理 --}}
    <form action="{{ route("players.add") }}" method="post">
        @csrf
            <input type="hidden" name="uniform_number" value={{ $inputs['uniform_number'] }}>
            <input type="hidden" name="player_name" value="{{ $inputs['player_name'] }}">
            @if(array_key_exists('profile_image',$inputs))
                <input type="hidden" name="profile_image" value={{ $profile_image_path }}>
            @endif
            <input type="hidden" name="position" value={{ $inputs['position'] }}>
            <button type="submit">登録</button>
    </form>
</body>
</html>