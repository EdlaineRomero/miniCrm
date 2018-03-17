<?php
namespace App\Services;

use App\Repositories\EmployeesRepository;
use App\Validators\EmployeesValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;

class EmployeesService{

	
	private $repository;

	private $validator;

	public function __construct(EmployeesRepository $repository,EmployeesValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function store($data)
	{
		
		try{

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$employee = $this->repository->create($data);

			return [
				'success'=> true,
				'message'=> 'Employee Register',
				'data'=> $employee,
			];

		}catch(\Exception $e){

			return [
				'success'=> false,
				'message'=> $e->getMessageBag(),

			];
		}

	}

	public function update($data, $id){

		try{

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$employee = $this->repository->update($data, $id);

			return [
				'success'=> true,
				'message'=> 'Employee update',
				'data'=> $employee,
			];

		}catch(\Exception $e){

			return [
				'success'=> false,
				'message'=> $e->getMessage(),

			];
		}
	}

	public function destroy($id)
	{
		try{
			
			$employee = $this->repository->delete($id);

			return [
				'success'=> true,
				'message'=> 'Employee removido',
				'data'=> null,
			];

		}catch(\Exception $e){

			return [
				'success'=> false,
				'message'=> $e->getMessage(),

			];
		}
	}
}