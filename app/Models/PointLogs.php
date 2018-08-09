<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointLogs extends Model
{
    protected $fillable = [
    	'id',
    	'point_type',
    	'user_id',
    	'point_score',
    	'taggable_type',
    	'taggable_id'
    ];

    protected $table = "point_logs";

    public function taggable()
    {
      return $this->morphTo();
    }
    
}
