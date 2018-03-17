<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Employees;

/**
 * Class EmployeesTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmployeesTransformer extends TransformerAbstract
{
    /**
     * Transform the Employees entity.
     *
     * @param \App\Entities\Employees $model
     *
     * @return array
     */
    public function transform(Employees $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
