<?php
namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Validators\CompanyValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CompanyCreateRequest;

class ImagemService{

public function uploadImagem($request){

		
		try{			   
       		if ($request->hasFile('logo') && $request->file('logo')->isValid()) {	
				$path = $request->file('logo')->store('images');

				return [
					'success'=> true,
					'message'=> 'Image resgister',
					'fileName'=> $path,
				
				];
			}else{
				return [
					'success'=> false,
					'message'=> 'File invalid',				
				];
			}	
        	
		}catch(\Exception $e){
        	return [
				'success'=> false,
				'message'=> $e->getMessage(),				
			];

		}
	}
}