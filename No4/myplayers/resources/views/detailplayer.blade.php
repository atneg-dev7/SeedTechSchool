<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myplayers</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailplayer.css') }}">

</head>
<body>
    <h1>選手詳細</h1>
    <div class="player-wrapper">
        @if(!empty($player->profile_image))
            <img src="{{ asset('/storage/images/'.$player->profile_image) }}" alt="" class="player-image">
        @else
            <p class="player-image">プロフィール画像なし</p>
        @endif

        <div class="player-header">
            <h2>{{ $player->uniform_number }} {{ $player->player_name }}</h2>
            <p>{{ $player->position }}</p>

            <a href="{{ route('players.edit',$player->id) }}"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
            <a href="{{ route('players.delete',$player->id) }}"><i class="fa-regular fa-trash-can fa-2x"></i></a>
            <div class="performance-summary">
                <table>
                    <tr>
                        <th>打率</th>
                        <td>{{ $performance_summary['batting_average'] }}</td>
                    </tr>
                    <tr>
                        <th>長打率</th>
                        <td>{{ $performance_summary['slugging_percentage'] }}</td>
                    </tr>
                        <th>出塁率</th>
                        <td>{{ $performance_summary['on_base_percentage'] }}</td>
                    </tr>
                    <tr>
                        <th>OPS</th>
                        <td>{{ $performance_summary['ops'] }}</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th>打点</th>
                        <td>{{ $performance_summary['rbi_sum'] }}</td>
                    </tr>
                    <tr>
                        <th>安打数</th>
                        <td>{{ $performance_summary['hits'] }}</td>
                    </tr>
                        <th>本塁打数</th>
                        <td>{{ $performance_summary['homerun_sum'] }}</td>
                    </tr>
                    <tr>
                        <th>盗塁数</th>
                        <td>{{ $performance_summary['steal_sum'] }}</td>
                    </tr>
                </table>
            </div>


        </div>
    </div>

    <h1>成績履歴</h1>
    <a href="{{ route('performances.register',$player->id) }}"><i class="fa-solid fa-plus"></i>成績登録</a>

    <table class="performance-table">
        <tr>
            <th class="icon"></th>
            <th class="icon"></th>
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
        @foreach($performances as $performance)
        <tr>
            <td class="icon">
                <a href="{{ route('performances.edit',$performance->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
            <td class="icon">
                <form action="{{ route('performances.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="player_id" value={{ $player->id }}>
                    <input type="hidden" name="performance_id" value={{ $performance->id }}>
                    <button type="submit" class="performance-delete-btn"><i class="fa-regular fa-trash-can"></i></button>
                </form>
            </td>
            <td>{{ $performance->game_date }}</td>
            <td>{{ $performance->opponent }}</td>
            <td>{{ $performance->at_bat }}</td>
            <td>{{ $performance->single }}</td>
            <td>{{ $performance->double }}</td>
            <td>{{ $performance->triple }}</td>
            <td>{{ $performance->homerun }}</td>
            <td>{{ $performance->strikeout }}</td>
            <td>{{ $performance->walk }}</td>
            <td>{{ $performance->hit_by_pitch }}</td>
            <td>{{ $performance->steal }}</td>
            <td>{{ $performance->sacrifice_bunt }}</td>
            <td>{{ $performance->sacrifice_fly }}</td>
            <td>{{ $performance->rbi }}</td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route("myplayers") }}" class=>選手一覧へ戻る</a>
</body>
</html>