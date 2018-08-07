<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable = [
        'id',
        'team_name',
        'shirt_img_url',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $table = "teams";
}
