<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Apartamento;

/**
 * Class ApartamentoTransformer
 * @package namespace App\Transformers;
 */
class ApartamentoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Apartamento entity
     * @param \Apartamento $model
     *
     * @return array
     */
    public function transform(Apartamento $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
