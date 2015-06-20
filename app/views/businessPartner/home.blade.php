@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  	<h3>BUSINESS PARTNER HOME</h3>
		  </div>
		</div>
	</div>
	<div>
		<a href="{{route('business_partner.requirement.new')}}">Añadir nuevo requerimiento</a>
	</div>

	{{Form::open(array('route' => 'business_partner.home.search'))}}
	<div class="row">
	<select name="filter">
		@if(isset($filter))
			@if($filter == 0)
			<option value="0" selected>Borrador</option>
			<option value="1">Enviado</option>
			<option value="2">Terminado</option>
			@elseif($filter == 1)
			<option value="0" >Borrador</option>
			<option value="1" selected>Enviado</option>
			<option value="2">Terminado</option>
			@elseif($filter == 2)
			<option value="0" >Borrador</option>
			<option value="1">Enviado</option>
			<option value="2" selected>Terminado</option>
			@endif
		@else
			<option value="0" selected>Borrador</option>
			<option value="1">Enviado</option>
			<option value="2">Terminado</option>
		@endif
		
	</select>
	{{Form::submit('Buscar', array('class' => 'btn btn-default'))}}
	{{Form::close()}}

	<table class="table table-hover">
      <caption>Requerimientos llenados recientemente:</caption>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Fecha</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
      	@if($data)
	      	@foreach($data as $d)
	      	<tr>
	      	  <th scope="row"><a href="{{route('home')}}/business_partner/resume_requirement/{{$d["formID"]}}">{{$d["formID"]}}</a></th>
	          <td>{{$d["name"]}}</td>
	          <td>{{$d["lastName"]}}</td>
	          <td>{{$d["date"]}}</td>
	          <td>
	          @if($d["status"] == 0 && $d["statusEnd"] == 0)
	          	Borrador
	          @elseif($d["status"] == 1 && $d["statusEnd"] == 0)
	          	Enviado
	          @elseif($d["status"] == 1 && $d["statusEnd"] == 1)
	          	Terminado
	          @endif
	          </td>
	        </tr>
	      	@endforeach
	      @endif
      </tbody>
    </table>
@stop