<?php
namespace App\Services;

use Mail;

class EmailService{
	

	public function mail($data){

		try{
		
	    	Mail::send('component.mail', $data, function($message) use ($data) {
				
	        	$message->to($data['email']);

	        	$message->subject('Mini-CRM Register');        	
	    	});
	    	return [
				'success'=> true,
				'message'=> 'Empresa Cadastrada com sucesso, foi enviando um email de confirmação',

			];

		}catch(\Exception $e){

			return [
				'success'=> false,
				'message'=> $e->getMessage(),

			];
		}
    
	}
}