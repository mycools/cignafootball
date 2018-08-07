<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Match.
 *
 * @package namespace App\Entities;
 */
class Match extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $table = "matchs";

    public function TeamA()
    {
        return $this->belongsTo('App\Entity\Team', 'team_a', 'id');
    }

    public function TeamB()
    {
        return $this->belongsTo('App\Entity\Team', 'team_b', 'id');
    }

}
