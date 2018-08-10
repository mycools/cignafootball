<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invites extends Model
{
    protected $fillable = [
    	'user_id',
    	'invitee_id'
    ];

    protected $table = "invites";

    public function invites()
    {
      return $this->morphTo();
    }
}
