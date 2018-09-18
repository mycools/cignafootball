<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserIncomplete extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users_incomplete';
    protected $fillable = [
        'email',
        'phoneno',
        'title_id',
        'first_name',
        'last_name',
        'birthdate',
        'salary_id',
        'occupation_id',
        'team_id',
        'tc_accept'
    ];
}
