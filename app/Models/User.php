<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phoneno',
        'title_id',
        'first_name',
        'last_name',
        'birthdate',
        'salary_id',
        'occupation_id',
        'team_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function routeNotificationForCorpSMS()
    {
        return $this->phoneno;
    }

    public function getRank()
    {
        return $this->hasOne('App\Models\Ranks', 'user_id', 'id');
    }
    public function getBets()
    {
        return $this->hasOne('App\Models\Bets', 'user_id', 'id');
    }
}
