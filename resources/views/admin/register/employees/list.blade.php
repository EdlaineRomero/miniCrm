<div class="box box-body">
    <div class="box-header">
        <h3 class="title">List Employees</h3>
    </div>
    <table id="table_employee" class="display">
        <thead>
             <tr>
                <th>#</th>
                <th>Company</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Menu</th>

            </tr>
        </thead>
        <tbody>
            @foreach($employees_list as $employee)
            <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->company->name}}</td>
                <td>{{$employee->firstName}}</td>
                <td>{{$employee->lastName}}</td>
                <td>{{$employee->email}}</td>                
                <td>{{$employee->phone}}</td>  
                <td class="col-xs-2">                    
                     <a class="btn  btn-default"                             
                            href="{{route('employee.edit',$employee->id)}}" 
                            unselectable="on">    
                        <span class="fa fa-pencil"></span>    
                    </a>
                    {!! Form::open(['route'=>['employee.destroy',$employee->id],'method' => 'DELETE']) !!}
                    {!! Form::button('<span class="fa fa-trash-o"></span>',['type'=>'submit','class'=>'btn  btn-default'])!!}                      
                    {!! Form::close() !!} 
                </td> 
            </tr>            
            @endforeach
        </tbody>
    </table>
</div>

@section('adminlte_js')    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table_employee').DataTable();
        } );
    </script>
    @yield('js')
@stop