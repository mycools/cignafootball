<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invites extends Model
{
    protected $fillable = [];

    protected $table = "invites";

    public function invites()
    {
      return $this->morphTo();
    }
}
