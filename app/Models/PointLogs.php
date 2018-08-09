<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointLogs extends Model
{
    protected $fillable = [];

    protected $table = "point_logs";

    public function taggable()
    {
      return $this->morphTo();
    }
    
}
