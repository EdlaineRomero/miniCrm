@extends('adminlte::page')

@section('title', 'Mini-CRM')

@section('content_header')
    <h1>{{ trans('adminlte::adminlte.titleHome') }}</h1>
@stop

@section('content')
    
	<h3>{{ trans('adminlte::adminlte.requeriments') }}</h3>
    <p>-{{ trans('adminlte::adminlte.lblHome1') }}</p>
    <p>-{{ trans('adminlte::adminlte.lblHome2') }}</p>
    <p>-{{ trans('adminlte::adminlte.lblHome3') }}</p>

	<p>-{{ trans('adminlte::adminlte.lblHome4') }}</p>

    <p>Name ({{ trans('adminlte::adminlte.requerid') }}),</p>

    <p>E-mail,</p>
   <p>Logo (minimum 100×100),</p>

    <p>Website</p>


	<p>-{{ trans('adminlte::adminlte.lblHome5') }}</p>

    <p>	{{ trans('adminlte::adminlte.firstName') }} ({{ trans('adminlte::adminlte.requerid') }}),</p>

    <p>	{{ trans('adminlte::adminlte.lastName') }}({{ trans('adminlte::adminlte.requerid') }}),</p>

    <p>	{{ trans('adminlte::adminlte.lblHome6') }},</p>

  <p>	E-mail,</p>

<p>{{ trans('adminlte::adminlte.phone') }}</p>


<p>- {{ trans('adminlte::adminlte.lblHome7') }}</p>

<p>- {{ trans('adminlte::adminlte.lblHome8') }}</p>

<p>- {{ trans('adminlte::adminlte.lblHome9') }} </p>

<p>- {{ trans('adminlte::adminlte.lblHome10') }}</p>

<p>- {{ trans('adminlte::adminlte.lblHome11') }}</p>

<p>- {{ trans('adminlte::adminlte.lblHome12') }}</p>


	<h3>BONUS</h3>


<label>{{ trans('adminlte::adminlte.lblHome13') }} </label>


<p>- {{ trans('adminlte::adminlte.lblHome14') }}</p>

<p>- {{ trans('adminlte::adminlte.lblHome15') }}</p>

<p>- {{ trans('adminlte::adminlte.lblHome16') }}</p>

<p>- {{ trans('adminlte::adminlte.lblHome17') }}</p>

<p>- {{ trans('adminlte::adminlte.lblHome18') }}</p>
@stop