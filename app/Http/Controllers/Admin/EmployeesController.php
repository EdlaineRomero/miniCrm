<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmployeesCreateRequest;
use App\Http\Requests\EmployeesUpdateRequest;
use App\Repositories\EmployeesRepository;
use App\Repositories\CompanyRepository;
use App\Validators\EmployeesValidator;
use App\Services\EmployeesService;

/**
 * Class EmployeesController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class EmployeesController extends Controller
{
   
    protected $repository;
   
    protected $service;

    protected $companyRepository;

    
    public function __construct(EmployeesRepository $repository, EmployeesService $service, CompanyRepository $companyRepository)
    {
        $this->repository           = $repository;
        $this->service              = $service;
        $this->companyRepository    =$companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employees  = $this->repository->all();
        $company    = $this->companyRepository->selectBoxList();
       

        return view('admin.register.employees.index',[
            'employees'=>$employees,
            'company'=>$company
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmployeesCreateRequest $request)
    {

        $request =$this->service->store($request->all());

        session()->flash('success', [
            'success'=>$request['success'],
            'message'=>$request['message']
        ]);             

        return redirect()->route('employee.index');   
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
        $employee = $this->repository->find($id);
        $company    = $this->companyRepository->selectBoxList();

        return view('admin.register.employees.edit',[
            'employee'=>$employee,
            'company'=>$company
        ]);        
    }

  
    public function update(EmployeesUpdateRequest $request, $id)
    {
         $request =$this->service->update($request->all(),$id);

        session()->flash('success', [
            'success'=>$request['success'],
            'message'=>$request['message']
        ]);             

        return redirect()->route('employee.index');   
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
        
        return redirect()->route('employee.index');
    }
}
