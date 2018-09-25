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

    public function routeNotificationForCorpSMS()
    {
        return $this->phoneno;
    }

    public function getRank()
    {
        return $this->hasOne('App\Models\Ranks', 'user_id', 'id');
    }

    public function pointlogs()
    {
        return $this->morphMany('App\Models\PointLogs', 'taggable');
    }
}
