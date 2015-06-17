@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  	<h1>REQUIREMENT</h1>
		  </div>
		</div>
	</div>
  <caption>Empleado: {{$employee->name}} {{$employee->lastname}}</caption>
	<table class="table table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Estado</th>
          <th>Observaciones</th>
          <th>Encargado</th>
          <th>Correo</th>
        </tr>
      </thead>
      <tbody>
      @if($requirements)
      	@foreach($requirements as $requirement)
      	<tr>
      		<td>{{$requirement['name']}}</td>
      		<td>
      			@if($requirement['status'] == 0)
      				Recibido
      			@elseif($requirement['status'] == 1)
      				En proceso
      			@elseif($requirement['status'] == 2)
              Llenado
            @elseif($requirement['limitDate'] < date('Y-m-d'))
              Vencido
            @elseif($requirement['status'] == 3)
              Anulado
      			@endif
      		
      		</td>
      		<td>{{$requirement['observation']}}</td>
      		<td>
      			{{$users[$requirement['role']]['name']}}
      		</td>
      		<td>
            <a href="mailto:{{$users[$requirement['role']]['email']}}?Subject=Aviso%20sobre%20Requerimiento">
              <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
            </a>
          </td>
      	</tr>
      	@endforeach
      @endif
      </tbody>
     </table>
@stop