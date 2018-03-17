@extends('adminlte::page')

@section('content_header')
    <h1>Company  {{$companies->name}}</h1>
@stop

@section('content')

@include('admin.register.employees.list',['employees_list'=>$companies->employees])
 
@stop
