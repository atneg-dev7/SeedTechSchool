<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\Auth;

class MyPlayersController extends Controller
{
    public function index()
    {
        $players = Player::where('user_id', Auth::user()->id)->get();
        return view('myplayers',['players'=>$players]);
    }
}
