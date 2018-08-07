<?php

namespace App\Presenters;

use App\Transformers\InviteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InvitePresenter.
 *
 * @package namespace App\Presenters;
 */
class InvitePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new InviteTransformer();
    }
}
