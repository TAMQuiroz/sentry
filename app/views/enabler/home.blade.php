@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<h1>Home del Autorizador</h1>
	{{Form::open(array('route' => 'enabler.home.search'))}}
	<div class="row">
	<select name="filter">
		<option value="0" selected>En proceso</option>
		<option value="2">Llenado</option>
	</select>
	{{Form::submit('Buscar', array('class' => 'btn btn-default'))}}
	{{Form::close()}}
	<table class="table table-hover">
      <caption></caption>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Area</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
      	@if($data)
	      	@foreach($data as $d)
	      	<tr>
	      		@if($d["req"]->status == 2)
	          	<td>{{$d["employee"]->name}}</td>
	          	@else
	          	<td><a href="{{route('home')}}/enabler/requirement/{{$d["formID"]}}">{{$d["employee"]->name}}</a></td>
	        	@endif
	          	<td>{{$d["employee"]->lastname}}</td>
	          	<td>{{$d["area"]->description}}</td>
	          	<td>
	          	@if($d["req"]->status == 0)
	          		En proceso
	          	@else
	          		Llenado
	          	@endif     	
	          </td>
	        </tr>
	      	@endforeach
	      @endif
      </tbody>
    </table>
@stop