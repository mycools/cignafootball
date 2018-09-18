<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserProfile extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users_profile';
    protected $fillable = [
        'user_id',
        'username',
        'email',
        'phoneno',
        'title_id',
        'first_name',
        'last_name',
        'birthdate',
        'salary_id',
        'occupation_id',
        'team_id',
        'active'
    ];
}
