<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\PointLog;

/**
 * Class PointLogTransformer.
 *
 * @package namespace App\Transformers;
 */
class PointLogTransformer extends TransformerAbstract
{
    /**
     * Transform the PointLog entity.
     *
     * @param \App\Entities\PointLog $model
     *
     * @return array
     */
    public function transform(PointLog $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
