@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  	<h3>HOME PAGE DE ADMINISTRATIVE COLABORATOR</h3>
		  </div>
		</div>
	</div>

  {{Form::open(array('route' => 'colaborator.admin.home.search'))}}

  <div class="row">
    <select name="filter">
    @if(isset($filter))
      @if($filter == 0)
      <option value="0" selected>Recibido</option>
      <option value="1">En proceso</option>
      <option value="2">Llenado</option>
      <option value="3">Vencido</option>
      @elseif($filter == 1)
      <option value="0" >Recibido</option>
      <option value="1" selected>En proceso</option>
      <option value="2">Llenado</option>
      <option value="3">Vencido</option>
      @elseif($filter == 2)
      <option value="0" >Recibido</option>
      <option value="1" >En proceso</option>
      <option value="2" selected>Llenado</option>
      <option value="3">Vencido</option>
      @elseif($filter == 3)
      <option value="0" >Recibido</option>
      <option value="1" >En proceso</option>
      <option value="2" >Llenado</option>
      <option value="3" selected>Vencido</option>
      @endif 
    @else
    <option value="0" selected>Recibido</option>
    <option value="1">En proceso</option>
    <option value="2">Llenado</option>
    <option value="3">Vencido</option>
    @endif
    </select>
  </div>

  {{Form::submit('Buscar', array('class' => 'btn btn-default'))}}
  {{Form::close()}}

	{{Form::open()}}
	{{Form::submit('Guardar')}}
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
              @if($req->status == 0)
                <option value="0" selected>Recibido</option>
                <option value="1">En proceso</option>
                <option value="2">Llenado</option>
              @elseif($req->status == 1)
                <option value="0">Recibido</option>
                <option value="1" selected>En proceso</option>
                <option value="2">Llenado</option>
              @else
                <option value="2" disabled>Llenado</option>
              @endif 							
      		  </select>

      		</td>
      	</tr>
      		
      	@endforeach
      	
      </tbody>
    </table>
    {{Form::close()}}
@stop