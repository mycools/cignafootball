<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Rank.
 *
 * @package namespace App\Entities;
 */
class Rank extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $table = "ranks";

    public function User()
    {
        return $this->belongsTo('App\Entity\User', 'user_id', 'id');
    }

}
