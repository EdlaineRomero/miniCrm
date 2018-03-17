@extends('adminlte::page')

@section('title', 'Mini-CRM')


@section('content_header')
    <h1>
        Mini-CRM
        <small>register</small>
    </h1>
@stop

@section('content')   
    @include('component.alert')  
  
<div class="row">
    <div class="col-xs-12">
    {!! Form::open(['route'=>'company.store', 'method' => 'post','enctype'=>'multipart/form-data'])!!}
        {{ csrf_field() }}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Register Company</h3>                    
            </div>
            <div class="box-body">           
                <div class="col-xs-6">
        	        <labele>Name</label>
                    <input type="text" name="name" class="form-control"
                       placeholder="name">                    
               </div>
               <div class="col-xs-6">
                	<label>Email</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="email">                                     
                </div>            
                <div class="col-xs-6">
                    <label>WebSite</label>
                    <input type="text" name="webSite" class="form-control"
                           placeholder="web Site">                                     
                </div>
                <div class="col-xs-6">
                  <label for="logoInputFile">Logo</label>
                  <input id="logo" name="logo" type="file" accept="image/*">
                </div>
            </div> 
            <div class="box-footer">                    
                 <div class="col-xs-12">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>                    
            </div> 
        </div>    
    {!! Form::close() !!}

    <div class="box box-body">
        <div class="box-header">
            <h3 class="title">List Company</h3>
        </div>
        <table id="table_company" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>WebSite</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>                        
                         <img url="{{ public_path("storage/{$company->logo}") }}">
                    </td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->website}}</td>                
                    <td class="col-xs-3">   
                         <a class="btn  btn-default"                             
                            href="{{route('company.show',$company->id)}}"
                            unselectable="on">    
                            <span class="fa fa-users"></span>    
                        </a>
                         <a class="btn  btn-default"                             
                            href="{{route('company.edit',$company->id)}}" 
                            unselectable="on">    
                        <span class="fa fa-pencil"></span>    
                        </a>
                        {!! Form::open(['route'=>['company.destroy',$company->id],'method' => 'DELETE','class'=>'btn  btn-default']) !!}
                        {!! Form::button('<span class="fa fa-trash-o"></span>',['type'=>'submit','class'=>'btn  btn-default'])!!}                      
                        {!! Form::close() !!} 
                        
                    </td> 
                </tr>            
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div> 
@endsection

@section('adminlte_js')    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table_company').DataTable();
        } );
    </script>
    @yield('js')
@stop