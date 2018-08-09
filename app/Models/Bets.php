<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    protected $fillable = [];

    protected $table = "bets";
    public function bets()
    {
      return $this->morphTo();
    }
}
