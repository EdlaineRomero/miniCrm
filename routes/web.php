<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//verifica se usuario esta autenticado no sistema
Route::group(['middleware' => ['auth'], 'namespace'=>'Admin'],function(){

	Route::get('admin', 'AdminController@index')->name('admin.home');
	Route::get('admin/company', 'CompaniesController@index')->name('admin.company');
	Route::get('admin/employee', 'EmployeesController@index')->name('admin.employee');

	Route::resource('company','CompaniesController');
	Route::resource('employee','EmployeesController');

	//rota para tradução
	Route::get('/{locale}', function ($locale) {
	
		\Session::put('locale',$locale);
			
		$backUrl = redirect()->back()->getTargetUrl(); 
		
		return redirect()->to($backUrl);     

	})->middleware('locale')->name('locale');
 
});

//Rota Welcome 
Route::get('/', 'Site\SiteController@index')->name('site.home');


 



 