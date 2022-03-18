<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Performance;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    // 選手登録画面へ
    public function register()
    // public function register($id)
    {
        // $player = Player::find($id);
        // $performances = Performance::where('player_id',$id);
        // return view('player', ['player'=>$player, 'performances'=>$performances]);
        return view('registerplayer');
    }

    // 確認画面へ
    public function confirm(Request $request)
    {
        $inputs = $request->all();
        $profile_image_path = "";
        if(array_key_exists('profile_image',$inputs))
        {
            $profile_image_path = $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->storeAs('public/images',$profile_image_path);
        }

        //  登録画面からの遷移の場合登録確認画面へ返す
        if($request->get('register'))
        {
            return view('registerconfirmplayer',['inputs'=>$inputs, 'profile_image_path'=>$profile_image_path]);
        // 編集画面からの遷移の場合編集確認画面へ返す
        } else if($request->get('edit')){
            return view('editconfirmplayer',['inputs'=>$inputs, 'profile_image_path'=>$profile_image_path]);
        }
    }

    // 確認画面から戻る
    public function modify(Request $request)
    {
        $inputs = $request->all();
        $player = Player::find($request->id);
        $profile_image_path = $request->profile_image;
        Storage::delete('public/images/'.$profile_image_path);

        // 登録確認画面からの遷移の場合登録画面へ返す
        if($request->get('register'))
        {
            return view('registerplayer',['inputs'=>$inputs]);
        // 編集確認画面からの遷移の場合編集画面へ返す
        } else {
            return view('editplayer',['player'=>$player]);
        }
    }

    // 登録確認画面から登録処理
    public function add(Request $request)
    {
        $profile_image_path = '';
        if(isset($request->profile_image))
        {
            $profile_image_path = $request->profile_image;
        }
        Player::create([
            'uniform_number'=>$request->uniform_number,
            'user_id'=>Auth::user()->id,
            'player_name'=>$request->player_name,
            'profile_image'=>$profile_image_path,
            'position'=>$request->position
        ]);

        return redirect()->route('myplayers');
    }

    // 選手詳細画面へ
    public function detail($id)
    {
        $player = Player::find($id);
        $performances =  Performance::where('player_id',$id)->orderBy('game_date','desc')->get();

        $performance_summary = [
            'at_bat_sum'=>0,
            'single_sum'=>0,
            'double_sum'=>0,
            'triple_sum'=>0,
            'homerun_sum'=>0,
            'strikeout_sum'=>0,
            'walk_sum'=>0,
            'hit_by_pitch_sum'=>0,
            'steal_sum'=>0,
            'sacrifice_bunt_sum'=>0,
            'sacrifice_fly_sum'=>0,
            'rbi_sum'=>0,
            'batting_average'=>0,
            'slugging_percentage'=>0,
            'on_base_percentage'=>0,
            'ops'=>0,
            'hits'=>0
        ];

        foreach($performances as $performance)
        {
            $performance_summary['at_bat_sum'] += $performance->at_bat;
            $performance_summary['single_sum'] += $performance->single;
            $performance_summary['double_sum'] += $performance->double;
            $performance_summary['triple_sum'] += $performance->triple;
            $performance_summary['homerun_sum'] += $performance->homerun;
            $performance_summary['strikeout_sum'] += $performance->strikeout;
            $performance_summary['walk_sum'] += $performance->walk;
            $performance_summary['hit_by_pitch_sum'] += $performance->hit_by_pitch;
            $performance_summary['steal_sum'] += $performance->steal;
            $performance_summary['sacrifice_bunt_sum'] += $performance->sacrifice_bunt;
            $performance_summary['sacrifice_fly_sum'] += $performance->sacrifice_fly;
            $performance_summary['rbi_sum'] += $performance->rbi;
        }

        if(!$performance_summary['at_bat_sum']==0){
            $performance_summary['batting_average'] 
            = sprintf('%.3f',round(($performance_summary['single_sum'] + $performance_summary['double_sum'] + $performance_summary['triple_sum'] + $performance_summary['homerun_sum']) / $performance_summary['at_bat_sum'],3));

            $performance_summary['slugging_percentage'] 
            = ($performance_summary['single_sum'] + 2 * $performance_summary['double_sum'] + 3 * $performance_summary['triple_sum'] + 4 * $performance_summary['homerun_sum']) 
                / $performance_summary['at_bat_sum'];

            $performance_summary['on_base_percentage'] 
            = ($performance_summary['single_sum'] + $performance_summary['walk_sum'] + $performance_summary['hit_by_pitch_sum']) 
                / ($performance_summary['at_bat_sum'] + $performance_summary['walk_sum'] + $performance_summary['hit_by_pitch_sum'] + $performance_summary['sacrifice_fly_sum']);
            
            $performance_summary['ops'] = sprintf('%.3f',round($performance_summary['slugging_percentage'] + $performance_summary['on_base_percentage'],3));
            $performance_summary['slugging_percentage'] = sprintf('%.3f',round($performance_summary['slugging_percentage'],3));
            $performance_summary['on_base_percentage'] = sprintf('%.3f',round($performance_summary['on_base_percentage'],3));
        }

        $performance_summary['hits'] = $performance_summary['single_sum'] + $performance_summary['double_sum'] + $performance_summary['triple_sum'] + $performance_summary['homerun_sum'];

        return view('detailplayer',['player'=>$player,'performances'=>$performances,'performance_summary'=>$performance_summary]);
    }

    // 選手編集画面へ
    public function edit($id)
    {
        $player = Player::find($id);
        return view('editplayer',['player'=>$player]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $profile_image_path = '';
        $old_player_image = Player::find($id)->player_image;

        if(isset($request->profile_image))
        {
            // 以前のプロフィール画像の削除
            if(!empty($old_player_image))
            {
                Storage::delete('public/images/'.$old_player_image);
            }   
            $profile_image_path = $request->profile_image;
        } 

        Player::where('id','=',$id)->update([
            'id' => $request->id,
            'uniform_number' => $request->uniform_number,
            'player_name' => $request->player_name,
            'profile_image' => $profile_image_path,
            'position' => $request->position
        ]);

        return redirect()->route('myplayers');
    }

    // 選手削除
    public function delete($id)
    {
        $player = Player::find($id);

        // 画像削除
        $profile_image_path = $player->profile_image;
        Storage::delete('public/images/'.$profile_image_path);

        // 成績削除
        Performance::where('player_id','=',$player->id)->delete();

        // 選手削除
        Player::destroy($id);
        
        return redirect()->route('myplayers');
    }
}
