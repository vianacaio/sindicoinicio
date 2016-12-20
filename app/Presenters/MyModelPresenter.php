<?php

namespace App\Presenters;

use App\Transformers\MyModelTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MyModelPresenter
 *
 * @package namespace App\Presenters;
 */
class MyModelPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MyModelTransformer();
    }
}
