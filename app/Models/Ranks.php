<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranks extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'shirt_img_url',
        'predict_count',
        'win_count',
        'lose_count',
        'invitee_count',
        'point',
        'ranking_no',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $table = "ranks";

    public function getUser()
    {
    	return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
