<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable =[
        'player_id','game_date','opponent','at_bat','single','double','triple','homerun','strikeout','walk','hit_by_pitch','steal','sacrifice_bunt','sacrifice_fly','rbi'
    ];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }
}
