<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BetLogs extends Model
{
    protected $fillable = [
    	 'id',
        'user_id',
        'match_id',
        'predicted_team',
        'bet'
    ];

    protected $table = "bet_logs";
    public function bets()
    {
      return $this->morphTo();
    }
}
