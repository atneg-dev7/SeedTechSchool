<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myplayers</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myplayers.css') }}">
</head>
<body>
    <h1>選手一覧</h1>
    <a href="{{ route('players.register') }}">選手登録</a>

    @if($players->isEmpty())
        <div>選手が登録されていません</div>
    @else
        <div class="player-wrapper">
            @foreach($players as $player)
            <div class="player-box">
                <p class="player-header">{{ $player->uniform_number }} {{ $player->player_name }}</p>
                @if(!empty($player->profile_image))
                    <a href="{{ route('players.detail', $player->id) }}">
                        <img src="{{ asset('/storage/images/'.$player->profile_image) }}" alt="" class="player-image">
                    </a>
                @else
                    <a href="{{ route('players.detail', $player->id) }}">
                        <p class="player-header">プロフィール画像なし</p>
                    </a>
                @endif
            </div>
            @endforeach
        </div>
    @endif
</body>
</html>