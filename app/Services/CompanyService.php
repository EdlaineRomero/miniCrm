<?php
namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Validators\CompanyValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CompanyCreateRequest;

class CompanyService{

	
	private $repository;

	private $validator;

	
	public function __construct(CompanyRepository $repository,CompanyValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
		
	}

	public function store(CompanyCreateRequest $request)
	{
		try{		    
			$logo =$this->uploadImagem($request);
			
			$data=[
				'name'=> $request->name,
				'email'=> $request->email,
				'webSite'=>$request->webSite,
				'logo'=>$logo,
			];
			
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

        	$company = $this->repository->create($data);

			return [
				'success'=> true,
				'message'=> 'Company resgister',
				'data'=> $company,
			];

		}catch(\Exception $e){

			return [
				'success'=> false,
				'message'=> $e->getMessage(),

			];
		}

	}

	public function uploadImagem(CompanyCreateRequest $request){

		$nameFile = null; 
    
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {         
        
       		$name = uniqid(date('HisYmd')); 
        
        	$extension = $request->logo->extension(); 
        
        	$nameFile = "{$name}.{$extension}"; 
        
        	$upload = $request->logo->store('images');  
        	    
        	return $upload;
		}
	}

	public function update($request,$id){

		try{
			$logo =$this->uploadImagem($request);
			
			$data=[
				'name'=> $request->name,
				'email'=> $request->email,
				'webSite'=>$request->webSite,
				'logo'=>$logo,
			];
			
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

        	$company = $this->repository->update($data,$id);

			return [
				'success'=> true,
				'message'=> 'Company resgister',
				'data'=> $company,
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
			
			$company = $this->repository->delete($id);

			return [
				'success'=> true,
				'message'=> 'Company removido',
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