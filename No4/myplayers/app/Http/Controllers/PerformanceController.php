<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Performance;

class PerformanceController extends Controller
{
    public function register($id)
    {
        $player = Player::find($id);
        return view('registerperformance',['player'=>$player]);
    }

    // 確認画面へ
    public function confirm(Request $request)
    {
        $inputs = $request->all();

        // nullであった場合は0を格納
        $at_bat = ($inputs['at_bat']) ? $inputs['at_bat'] : 0;
        $single = ($inputs['single']) ? $inputs['single'] : 0;
        $double = ($inputs['double']) ? $inputs['double'] : 0;
        $triple = ($inputs['triple']) ? $inputs['triple'] : 0;
        $homerun = ($inputs['homerun']) ? $inputs['homerun'] : 0;
        $strikeout = ($inputs['strikeout']) ? $inputs['strikeout'] : 0;
        $walk = ($inputs['walk']) ? $inputs['walk'] : 0;
        $hit_by_pitch = ($inputs['hit_by_pitch']) ? $inputs['hit_by_pitch'] : 0;
        $steal = ($inputs['steal']) ? $inputs['steal'] : 0;
        $sacrifice_bunt = ($inputs['sacrifice_bunt']) ? $inputs['sacrifice_bunt'] : 0;
        $sacrifice_fly = ($inputs['sacrifice_fly']) ? $inputs['sacrifice_fly'] : 0;
        $rbi = ($inputs['rbi']) ? $inputs['rbi'] : 0;

        //  登録画面からの遷移の場合登録確認画面へ返す
        if($request->get('register'))
        {
            $inputs =[
                'player_id'=>$inputs['id'],
                'game_date'=>$inputs['game_date'],
                'opponent'=>$inputs['opponent'],
                'at_bat'=>$at_bat,
                'single'=>$single,
                'double'=>$double,
                'triple'=>$triple,
                'homerun'=>$homerun,
                'strikeout'=>$strikeout,
                'walk'=>$walk,
                'hit_by_pitch'=>$hit_by_pitch,
                'steal'=>$steal,
                'sacrifice_bunt'=>$sacrifice_bunt,
                'sacrifice_fly'=>$sacrifice_fly,
                'rbi'=>$rbi
            ];

            return view('registerconfirmperformance',['inputs'=>$inputs]);
        // 編集画面からの遷移の場合編集確認画面へ返す
        } else if($request->get('edit')){

            $inputs =[
                'id'=>$inputs['id'],
                'player_id'=>$inputs['player_id'],
                'game_date'=>$inputs['game_date'],
                'opponent'=>$inputs['opponent'],
                'at_bat'=>$at_bat,
                'single'=>$single,
                'double'=>$double,
                'triple'=>$triple,
                'homerun'=>$homerun,
                'strikeout'=>$strikeout,
                'walk'=>$walk,
                'hit_by_pitch'=>$hit_by_pitch,
                'steal'=>$steal,
                'sacrifice_bunt'=>$sacrifice_bunt,
                'sacrifice_fly'=>$sacrifice_fly,
                'rbi'=>$rbi
            ];

            return view('editconfirmperformance',['inputs'=>$inputs]);
        }
    }

    // 確認画面から戻る
    public function modify(Request $request)
    {
        $inputs = $request->all();
        $player = Player::find($request->player_id);

        // 登録確認画面からの遷移の場合登録画面へ返す
        if($request->get('register'))
        {
            return view('registerperformance',['inputs'=>$inputs,'player'=>$player]);
        // 編集確認画面からの遷移の場合編集画面へ返す
        } else {
            return view('editperformance',['inputs'=>$inputs]);
        }
    }

    // 登録確認画面から登録処理
    public function add(Request $request)
    {
        Performance::create([
            'player_id'=>$request->player_id,
            'game_date'=>$request->game_date,
            'opponent'=>$request->opponent,
            'at_bat'=>$request->at_bat,
            'single'=>$request->single,
            'double'=>$request->double,
            'triple'=>$request->triple,
            'homerun'=>$request->homerun,
            'strikeout'=>$request->strikeout,
            'walk'=>$request->walk,
            'hit_by_pitch'=>$request->hit_by_pitch,
            'steal'=>$request->steal,
            'sacrifice_bunt'=>$request->sacrifice_bunt,
            'sacrifice_fly'=>$request->sacrifice_fly,
            'rbi'=>$request->rbi
        ]);

        return redirect()->route('players.detail',$request->player_id);
    }

    // 成績削除
    public function delete(Request $request)
    {
        Performance::destroy($request->performance_id);
        return redirect()->route('players.detail',$request->player_id);
    }

    // 成績編集
    public function edit($id)
    {
        $performance = Performance::find($id);
        return view('editperformance',['performance'=>$performance]);
    }

    
    // 成績更新
    public function update(Request $request)
    {
        Performance::where('id','=',$request->id)->update([
            'id' => $request->id,
            'player_id'=>$request->player_id,
            'game_date'=>$request->game_date,
            'opponent'=>$request->opponent,
            'at_bat'=>$request->at_bat,
            'single'=>$request->single,
            'double'=>$request->double,
            'triple'=>$request->triple,
            'homerun'=>$request->homerun,
            'strikeout'=>$request->strikeout,
            'walk'=>$request->walk,
            'hit_by_pitch'=>$request->hit_by_pitch,
            'steal'=>$request->steal,
            'sacrifice_bunt'=>$request->sacrifice_bunt,
            'sacrifice_fly'=>$request->sacrifice_fly,
            'rbi'=>$request->rbi
        ]);
        return redirect()->route('players.detail',$request->player_id);
    }
}
