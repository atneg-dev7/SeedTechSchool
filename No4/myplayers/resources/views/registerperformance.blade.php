<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myplayers</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registerperformance.css') }}">
</head>
<body>
    <h1>成績登録</h1>
    <form action="{{ route('performances.confirm') }}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $player->id }}">

        <label for="opponent">試合日</label>
        @if(isset($inputs))
        <input type="date" name="game_date" id="game_date" value={{ $inputs['game_date'] }} required><br>
        @else
        <input type="date" name="game_date" id="game_date" required><br>
        @endif

        <label for="opponent">対戦相手</label>
        <select name="opponent" id="opponent" required>
            <option value="">未選択</option>
            <option value="ヤクルト">東京ヤクルトスワローズ</option>
            <option value="阪神">阪神タイガース</option>
            <option value="巨人">読売ジャイアンツ</option>
            <option value="広島">広島東洋カープ</option>
            <option value="中日">中日ドラゴンズ</option>
            <option value="DeNA">横浜DeNAベイスターズ</option>
            <option value="オリックス">オリックスバファローズ</option>
            <option value="ロッテ">千葉ロッテマリーンズ</option>
            <option value="楽天">東北楽天イーグルス</option>
            <option value="ソフトバンク">福岡ソフトバンクホークス</option>
            <option value="日本ハム">北海道日本ハムファイターズ</option>
            <option value="西武">埼玉西武ライオンズ</option>
        </select><br>

        <label for="at_bat">打数</label>
        @if(isset($inputs))
        <input type="text" name="at_bat" id="at_bat" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['at_bat'] }}><br>
        @else
        <input type="text" maxlength="11" name="at_bat" id="at_bat" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="single">安打</label>
        @if(isset($inputs))
        <input type="text" name="single" id="single" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['single'] }}><br>
        @else
        <input type="text" maxlength="11" name="single" id="single" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="double">二塁打</label>
        @if(isset($inputs))
        <input type="text" name="double" id="double" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['double'] }}><br>
        @else
        <input type="text" maxlength="11" name="double" id="double" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="triple">三塁打</label>
        @if(isset($inputs))
        <input type="text" name="triple" id="triple" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['triple'] }}><br>
        @else
        <input type="text" maxlength="11" name="triple" id="triple" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="homerun">本塁打</label>
        @if(isset($inputs))
        <input type="text" name="homerun" id="homerun" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['homerun'] }}><br>
        @else
        <input type="text" maxlength="11" name="homerun" id="homerun" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="strikeout">三振</label>
        @if(isset($inputs))
        <input type="text" name="strikeout" id="strikeout" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['strikeout'] }}><br>
        @else
        <input type="text" maxlength="11" name="strikeout" id="strikeout" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="walk">四球</label>
        @if(isset($inputs))
        <input type="text" name="walk" id="walk" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['walk'] }}><br>
        @else
        <input type="text" maxlength="11" name="walk" id="walk" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="hit_by_pitch">死球</label>
        @if(isset($inputs))
        <input type="text" name="hit_by_pitch" id="hit_by_pitch" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['hit_by_pitch'] }}><br>
        @else
        <input type="text" maxlength="11" name="hit_by_pitch" id="hit_by_pitch" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="steal">盗塁</label>
        @if(isset($inputs))
        <input type="text" name="steal" id="steal" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['steal'] }}><br>
        @else
        <input type="text" maxlength="11" name="steal" id="steal" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="sacrifice_bunt">犠打</label>
        @if(isset($inputs))
        <input type="text" name="sacrifice_bunt" id="sacrifice_bunt" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['sacrifice_bunt'] }}><br>
        @else
        <input type="text" maxlength="11" name="sacrifice_bunt" id="sacrifice_bunt" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="sacrifice_fly">犠飛</label>
        @if(isset($inputs))
        <input type="text" name="sacrifice_fly" id="sacrifice_fly" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['sacrifice_fly'] }}><br>
        @else
        <input type="text" maxlength="11" name="sacrifice_fly" id="sacrifice_fly" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif

        <label for="rbi">打点</label>
        @if(isset($inputs))
        <input type="text" name="rbi" id="rbi" pattern="^[0-9]+$" placeholder="数値のみ入力できます" value={{ $inputs['rbi'] }}><br>
        @else
        <input type="text" maxlength="11" name="rbi" id="rbi" pattern="^[0-9]+$" placeholder="数値のみ入力できます"><br>
        @endif
        
        <a href="{{ route('players.detail', $player->id) }}" class=>選手詳細へ戻る</a>
        <button type="submit" name="register" value="true">確認</button>
    </form>
</body>
</html>