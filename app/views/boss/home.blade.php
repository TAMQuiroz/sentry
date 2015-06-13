@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  	<h1>BOSS HOME</h1>
		  </div>

		</div>
	</div>
	<table class="table table-hover">
      <caption>Requerimientos recibidos recientemente:</caption>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Fecha de registro</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
      	@if($data)
	      	@foreach($data as $d)
	      	<tr>
	          <td><a href="{{route('home')}}/boss/requirement/{{$d["formID"]}}"> {{$d["name"]}} </a></td>
	          <td>{{$d["lastName"]}}</td>
	          <td>{{$d["date"]}}</td>
	          <td>
	          @if($d["statusEnd"] == 0)
	          	Abierto
	          @elseif($d["statusEnd"] == 1)
	          	Cerrado
	          @endif
	          </td>
	        </tr>
	      	@endforeach
	      @endif
      </tbody>
    </table>
@stop