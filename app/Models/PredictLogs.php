<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PredictLogs extends Model
{
    //
    protected $fillable = [
        'id',
       'user_id',
       'match_id',
       'point',
       'predicted_team'
   ];

   protected $table = "predict_logs";
}