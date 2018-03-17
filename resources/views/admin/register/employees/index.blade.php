@extends('adminlte::page')

@section('title', 'Mini-CRM')

@section('content_header')
    <h1>
      Mini - CRM
          <small>register</small>
    </h1>
@stop

@section('content')
  @include('component.alert')
  <div class="row">
    <div class="col-xs-12">
      {!! Form::open(['route'=>'employee.store', 'method' => 'post'])!!}
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Register Employee</h3>                    
          </div>     
          <div class="box-body">
            <div class="form-group col-xs-4">
                <label>Company</label> 
                  {!! Form::select('select',$company,null,['id'=>'company_id','class'=>'form-control', 'name'=>'company_id'])!!}                                       
            </div>    
          </div>   
          <div class="box-body col-xs-12">              
              <div class="col-xs-6">
                  <label>Fist Name</label>
                  <input type="text" name="firstName" class="form-control" value=""
                     placeholder="fist name">
              </div>
              <div class="col-xs-6">
                    <label>Last Name</label>
                    <input type="text" name="lastName" class="form-control" value=""
                           placeholder="lastName">
              </div>
              <div class="col-xs-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="email">
                    
              </div>
              <div class="col-xs-6">
                  <label>Phone</label> 
                  <input class="form-control" data-inputmask="" data-mask="" type="text">
              </div>
          </div> 
          <div class="box-footer">                    
               <div class="col-xs-12">
                  <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>                    
          </div>               
        </div>
        {!! Form::close() !!} 
      @include('admin.register.employees.list',['employees_list'=>$employees])
    </div>
</div>
@endsection
