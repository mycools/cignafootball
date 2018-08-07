<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\pointLogRepository;
use App\Entities\PointLog;
use App\Validators\PointLogValidator;

/**
 * Class PointLogRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PointLogRepositoryEloquent extends BaseRepository implements PointLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PointLog::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PointLogValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
