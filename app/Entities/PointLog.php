<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PointLog.
 *
 * @package namespace App\Entities;
 */
class PointLog extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $table = "pointLogs";

    public function User()
    {
        return $this->belongsTo('App\Entity\User', 'user_id', 'id');
    }

}
