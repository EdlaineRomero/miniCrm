<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class EmployeesValidator.
 *
 * @package namespace App\Validators;
 */
class EmployeesValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'firstName'=>'required',
        	'lastName'=>'required',
        	'company_id'=>'required|exists:companies,id',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'firstName'=>'required',
            'lastName'=>'required',
            'company_id'=>'required|exists:companies,id',
        ],
    ];
}
