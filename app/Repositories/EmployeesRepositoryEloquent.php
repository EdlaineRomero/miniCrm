<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EmployeesRepository;
use App\Entities\Employees;
use App\Validators\EmployeesValidator;

/**
 * Class EmployeesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmployeesRepositoryEloquent extends BaseRepository implements EmployeesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Employees::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EmployeesValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
