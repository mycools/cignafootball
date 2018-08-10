<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Bet;

/**
 * Class BetTransformer.
 *
 * @package namespace App\Transformers;
 */
class BetTransformer extends TransformerAbstract
{
    /**
     * Transform the Bet entity.
     *
     * @param \App\Entities\Bet $model
     *
     * @return array
     */
    public function transform(Bet $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
