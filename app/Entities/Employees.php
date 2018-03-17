<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Employees.
 *
 * @package namespace App\Entities;
 */
class Employees extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id','firstName','lastName','email','phone'];
    public $timestamps = true;
    
    public function company(){

    	return $this->belongsTo(Company::class);

    }
}
