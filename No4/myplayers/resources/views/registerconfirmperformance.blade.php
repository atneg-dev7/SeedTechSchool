<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myplayers</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registerconfirmperformance.css') }}">
</head>
<body>
    <h1>成績登録確認</h1>
    <table>
        <tr>
            <th>試合日</th>
            <th>対戦相手</th>
            <th>打数</th>
            <th>安打</th>
            <th>二塁打</th>
            <th>三塁打</th>
            <th>本塁打</th>
            <th>三振</th>
            <th>四球</th>
            <th>死球</th>
            <th>盗塁</th>
            <th>犠打</th>
            <th>犠飛</th>
            <th>打点</th>
        </tr>
        <tr>
            <td>{{ $inputs['game_date'] }}</td>
            <td>{{ $inputs['opponent'] }}</td>
            <td>{{ $inputs['at_bat'] }}</td>
            <td>{{ $inputs['single'] }}</td>
            <td>{{ $inputs['double'] }}</td>
            <td>{{ $inputs['triple'] }}</td>
            <td>{{ $inputs['homerun'] }}</td>
            <td>{{ $inputs['strikeout'] }}</td>
            <td>{{ $inputs['walk'] }}</td>
            <td>{{ $inputs['hit_by_pitch'] }}</td>
            <td>{{ $inputs['steal'] }}</td>
            <td>{{ $inputs['sacrifice_bunt'] }}</td>
            <td>{{ $inputs['sacrifice_fly'] }}</td>
            <td>{{ $inputs['rbi'] }}</td>
        </tr>
    </table>
    <h3>この成績を登録しますか？</h3>

        {{-- 修正処理 --}}
        <form action="{{ route("performances.modify") }}" method="post">
            @csrf
            <input type="hidden" name="player_id" value={{ $inputs['player_id'] }}>
            <input type="hidden" name="game_date" value={{ $inputs['game_date'] }}>
            <input type="hidden" name="opponent" value={{ $inputs['opponent'] }}>
            <input type="hidden" name="at_bat" value={{ $inputs['at_bat'] }}>
            <input type="hidden" name="single" value={{ $inputs['single'] }}>
            <input type="hidden" name="double" value={{ $inputs['double'] }}>
            <input type="hidden" name="triple" value={{ $inputs['triple'] }}>
            <input type="hidden" name="homerun" value={{ $inputs['homerun'] }}>
            <input type="hidden" name="strikeout" value={{ $inputs['strikeout'] }}>
            <input type="hidden" name="walk" value={{ $inputs['walk'] }}>
            <input type="hidden" name="hit_by_pitch" value={{ $inputs['hit_by_pitch'] }}>
            <input type="hidden" name="steal" value={{ $inputs['steal'] }}>
            <input type="hidden" name="sacrifice_bunt" value={{ $inputs['sacrifice_bunt'] }}>
            <input type="hidden" name="sacrifice_fly" value={{ $inputs['sacrifice_fly'] }}>
            <input type="hidden" name="rbi" value={{ $inputs['rbi'] }}>
            <button type="submit" name="register" value="true">戻る</button>
        </form>
    
        {{-- 登録処理 --}}
        <form action="{{ route("performances.add") }}" method="post">
            @csrf
            <input type="hidden" name="player_id" value={{ $inputs['player_id'] }}>
            <input type="hidden" name="game_date" value={{ $inputs['game_date'] }}>
            <input type="hidden" name="opponent" value={{ $inputs['opponent'] }}>
            <input type="hidden" name="at_bat" value={{ $inputs['at_bat'] }}>
            <input type="hidden" name="single" value={{ $inputs['single'] }}>
            <input type="hidden" name="double" value={{ $inputs['double'] }}>
            <input type="hidden" name="triple" value={{ $inputs['triple'] }}>
            <input type="hidden" name="homerun" value={{ $inputs['homerun'] }}>
            <input type="hidden" name="strikeout" value={{ $inputs['strikeout'] }}>
            <input type="hidden" name="walk" value={{ $inputs['walk'] }}>
            <input type="hidden" name="hit_by_pitch" value={{ $inputs['hit_by_pitch'] }}>
            <input type="hidden" name="steal" value={{ $inputs['steal'] }}>
            <input type="hidden" name="sacrifice_bunt" value={{ $inputs['sacrifice_bunt'] }}>
            <input type="hidden" name="sacrifice_fly" value={{ $inputs['sacrifice_fly'] }}>
            <input type="hidden" name="rbi" value={{ $inputs['rbi'] }}>
            <button type="submit">登録</button>
        </form>
</body>
</html>