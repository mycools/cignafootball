<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Bet.
 *
 * @package namespace App\Entities;
 */
class Bet extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $table = "bets";

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Match()
    {
        return $this->belongsTo('App\Entity\Match', 'match_id', 'id');
    }

    public function Team()
    {
        return $this->belongsTo('App\Entity\Team', 'predicted_team', 'id');
    }

}
