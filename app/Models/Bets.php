<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    protected $fillable = [
    	'id',
        'user_id',
        'match_id',
        'predicted_team',
        'bet'
    ];

    protected $table = "bets";
    public function bets()
    {
      return $this->morphTo();
    }

    public function match(){
        return $this->hasOne('App\Models\Match','id','match_id');
    }
    public function team(){
        return $this->hasOne('App\Models\Teams','id','predicted_team');
    }

}
