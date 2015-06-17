@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
{{-- TITULO --}}
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  	<h3>HOME PAGE DE INFRAESTRUCTURE COLABORATOR</h3>
		  </div>
		</div>
	</div>
	{{--<div>
		<a href="{{route('business_partner.requirement.new')}}">Añadir nuevo requerimiento</a>
	</div>--}}

	{{-- FILTRO --}}
	{{Form::open(array('route' => 'colaborator.home.search'))}}

	<div class="row">
		<select name="filter">
			<option value="0" selected>Recibido</option>
			<option value="1">En proceso</option>
			<option value="2">Llenado</option>
			<option value="3">Vencido</option>
			<option value="4">Anulado</option>
		</select>
	</div>
	{{Form::submit('Buscar', array('class' => 'btn btn-default'))}}
	{{Form::close()}}

	{{Form::open()}}
	{{Form::submit('Guardar')}}
	{{-- TABLA --}}
	<table class="table table-hover">
      <caption>Requerimientos llenados recientemente:</caption>
      <thead>
        <tr>
          <th>ID</th>
          <th>Requerimiento
          {{--<th>Posición</th>--}}
          <th>Fecha de vencimiento</th>
          <th>Estado actual</th>
          <th>Estado nuevo</th>
        </tr>
      </thead>
      <tbody>
      	
      	@foreach($reqs as $req)
      	<tr>
      		<td>{{$req->id}}</td>
      		<td>{{$req->name}}</td>
      		<td>{{$req->limitDate}}</td>
      		<td>
      			@if($req->status == 0)
      				Recibido
      			@elseif($req->status == 1)
      				En proceso
      			@elseif($req->status == 2)
      				Llenado
      			@endif
      		</td>
      		<td>
      			<select name="{{$req->id}}">	
      				<option value="0" selected>Recibido</option>
					<option value="1">En proceso</option>
					<option value="2">Llenado</option>
      			</select>
      		</td>
      	</tr>
      		
      	@endforeach
      	
      </tbody>
      {{Form::close()}}
    </table>
	
@stop