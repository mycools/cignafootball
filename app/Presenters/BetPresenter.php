<?php

namespace App\Presenters;

use App\Transformers\BetTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BetPresenter.
 *
 * @package namespace App\Presenters;
 */
class BetPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BetTransformer();
    }
}
