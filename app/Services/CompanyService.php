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

	public function uploadImagem($request){
			
		$file=$request->file('logo');
		$image = \Image::make($file);

		$image->resize(100,100,function($constraint){
			$constraint->aspectRatio();
		});

		$nameFile = uniqid();

   		$logo = pathinfo($nameFile,
	    	PATHINFO_FILENAME).'.'.$file->getClientOriginalExtension();

   		$image->save(public_path('storage/images/'.$logo));

   		$imageUrl = $image->dirname.'/'.$image->basename;

		return $image->basename;
			
       
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
				'message'=> 'Não foi possivel remover essa empresa, verifique se não existem funcionarios relacionados a ela',

			];
		}
	}
}