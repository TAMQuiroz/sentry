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
	      	  <th scope="row">{{$d["formID"]}}</th>
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