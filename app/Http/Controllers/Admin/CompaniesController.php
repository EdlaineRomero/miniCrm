<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Repositories\CompanyRepository;
use App\Validators\CompanyValidator;
use App\Services\CompanyService;
use App\Services\EmailService;


/**
 * Class CompaniesController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class CompaniesController extends Controller
{
   
    protected $repository;

    protected $service;

  

  
    public function __construct(CompanyRepository $repository,CompanyService $service)
    {
        $this->repository = $repository;
        $this->service  = $service;
    }

   
    public function index()
    {
        $companies = $this->repository->all();

        return view('admin.register.companies.index',[
                'companies'=>$companies,
        ]);
    }

    public function store(CompanyCreateRequest $data, EmailService $emailService)
    {
        $request =$this->service->store($data);        

        if($request['success'] && $data->email){

            $request = $emailService->mail($data->all());

        }
       
        session()->flash('success', [

            'success'=>$request['success'],
            'message'=>$request['message']
        ]);
        
             
        return redirect()->route('company.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->repository->find($id);

        return view('admin.register.companies.show',[
             'companies'=> $company,
             ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->repository->find($id);

        return view('admin.register.companies.edit',[
                'company'=>$company,
        ]);
    }

    
    public function update(CompanyUpdateRequest $data, $id)
    {
       $request =$this->service->update($data,$id);        

        session()->flash('success', [

            'success'=>$request['success'],
            'message'=>$request['message']
        ]);
             
        return redirect()->route('company.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request =$this->service->destroy($id);
       

        session()->flash('success', [

            'success'=>$request['success'],
            'message'=>$request['message']
        ]);

        return redirect()->route('company.index');
    }
}
