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
	{{Form::open(array('route' => 'business_partner.home.search'))}}
	<div class="row">
	<select name="filter">
		<option value="0" selected>Recibido</option>
		<option value="1">En proceso</option>
		<option value="2">Llenado</option>
		<option value="3">Vencido</option>
		<option value="4"Anulado</option>
	</select>
	{{Form::submit('Buscar', array('class' => 'btn btn-default'))}}
	{{Form::close()}}


	{{-- TABLA --}}
	<table class="table table-hover">
      <caption>Requerimientos llenados recientemente:</caption>
      <thead>
        <tr>
          <th>ID</th>
          <th>Requerimiento
          <th>Posición</th>
          <th>Fecha de vencimiento</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
      	{{--@if($data)
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
	      @endif--}}
      </tbody>
    </table>
	
@stop