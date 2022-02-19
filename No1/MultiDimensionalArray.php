<?php
    // 5次
    $ginza=['kabukiza'=>'歌舞伎座','ginzamitsukoshi'=>'銀座三越'];
    $nihonbashi=['tokyodaijingu'=>'東京大神宮','suitengu'=>'水天宮'];
    $shinbashi=['nihonTV'=>'日本テレビ','carettashiodome'=>'カレッタ汐留'];
    $akasaka=['akasakahikawa'=>'赤坂氷川神社','tokyomidtown'=>'東京ミッドタウン'];
    $kohnodai=['里見公園','国府台陸上競技場'];
    $onidaka=['ニッケコルトンプラザ','現代産業科学館'];
    $maihama=['ディズニーランド','イクスピアリ'];
    $hinode=['大江戸温泉浦安万華鏡','順天堂大学'];


    
    // 4次（$ginza…銀座、$nihonbashi…日本橋）
    $chuo=[$ginza, $nihonbashi];

    // 4次（$hinbashi…新橋、$akasaka…赤坂）
    $minato=[$shinbashi, $akasaka];

    // 4次（$kohnodai…国府台、$onidaka…鬼高）
    $ichikawa=[$kohnodai, $onidaka];

    // 4次（$maihama…舞浜、$hinode…日の出）
    $urayasu=[$maihama, $hinode];



    // 3次（$chuo…中央区、$minato…港区）
    $tokyo=[$chuo, $minato];

    // 3次（$ichikawa…市川市、$urayasu…浦安市）
    $chiba=[$ichikawa, $urayasu];



    // 2次（$tokyo…東京、$chiba…千葉）
    $kanto=[$tokyo, $chiba];



    // 1次（$kanto…関東地方）
    $region=[$kanto];



    echo $region[0][0][0][0]['ginzamitsukoshi'];
?>