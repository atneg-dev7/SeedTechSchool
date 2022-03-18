<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable =[
        'user_id','uniform_number','player_name','profile_image','position'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function performances()
    {
        return $this->hasMany('App\Performance');
    }
}
