<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\MyModel;

/**
 * Class MyModelTransformer
 * @package namespace App\Transformers;
 */
class MyModelTransformer extends TransformerAbstract
{

    /**
     * Transform the \MyModel entity
     * @param \MyModel $model
     *
     * @return array
     */
    public function transform(MyModel $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
