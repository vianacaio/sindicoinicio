<?php

namespace App\Presenters;

use App\Transformers\ApartamentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ApartamentoPresenter
 *
 * @package namespace App\Presenters;
 */
class ApartamentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ApartamentoTransformer();
    }
}
