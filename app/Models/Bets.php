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
}
