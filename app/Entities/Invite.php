<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Invite.
 *
 * @package namespace App\Entities;
 */
class Invite extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $table = "invites";

    public function Inviter()
    {
        return $this->belongsTo('App\Entity\User', 'inviter_id', 'id');
    }

    public function Invitee()
    {
        return $this->belongsTo('App\Entity\User', 'invitee_id', 'id');
    }

}
