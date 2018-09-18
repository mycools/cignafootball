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
        'team_id',
        'active',
        'hash_key',
        'ref_code',
        'ip_address'
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

    public function pointlogs()
    {
        return $this->morphMany('App\Models\PointLogs', 'taggable');
    }
}
