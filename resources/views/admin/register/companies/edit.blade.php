@extends('adminlte::page')

@section('title', 'Mini-CRM')


@section('content_header')
    <h1>
        Mini-CRM
        <small>Update</small>
    </h1>
@stop

@section('content')
     @if(session('success'))
        <h3>{{session('success')['message']}}</h3>    
    @endif
<div class="row">
    <div class="col-xs-12">
    {!! Form::model($company,['route'=>['company.update', $company->id], 'method' => 'put','enctype'=>'multipart/form-data'])!!}
        {{ csrf_field() }}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Company</h3>                    
            </div>
            <div class="box-body">           
                <div class="col-xs-6">
        	        <labele>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$company->name}}"
                       placeholder="name">                    
               </div>
               <div class="col-xs-6">
                	<label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$company->email}}"
                           placeholder="email">                                     
                </div>            
                <div class="col-xs-6">
                    <label>WebSite</label>
                    <input type="text" name="webSite" class="form-control" value="{{$company->webSite}}"
                           placeholder="web Site">                                     
                </div>
                <div class="col-xs-6">
                  <label for="logoInputFile">Logo</label>
                  <input id="logo" name="logo" type="file" accept="image/*">
                </div>
            </div> 
            <div class="box-footer">                    
                 <div class="col-xs-12">
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                </div>                    
            </div> 
        </div>    
    {!! Form::close() !!}
    </div>
</div> 
@endsection
