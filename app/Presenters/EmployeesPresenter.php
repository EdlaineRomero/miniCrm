<?php

namespace App\Presenters;

use App\Transformers\EmployeesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmployeesPresenter.
 *
 * @package namespace App\Presenters;
 */
class EmployeesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EmployeesTransformer();
    }
}
