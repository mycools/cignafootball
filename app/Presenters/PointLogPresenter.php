<?php

namespace App\Presenters;

use App\Transformers\PointLogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PointLogPresenter.
 *
 * @package namespace App\Presenters;
 */
class PointLogPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PointLogTransformer();
    }
}
