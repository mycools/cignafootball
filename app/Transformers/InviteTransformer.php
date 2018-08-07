<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Invite;

/**
 * Class InviteTransformer.
 *
 * @package namespace App\Transformers;
 */
class InviteTransformer extends TransformerAbstract
{
    /**
     * Transform the Invite entity.
     *
     * @param \App\Entities\Invite $model
     *
     * @return array
     */
    public function transform(Invite $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
