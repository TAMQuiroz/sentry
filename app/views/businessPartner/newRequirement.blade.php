@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  	<h3>NEW REQUIREMENT</h3>
		  </div>
		</div>
	</div>
	{{Form::open()}}
	<div class="row">
		<div class="panel panel-default col-md-12 ">
			<div class="panel-body">
		  		Tipo de Colaborador:
		  		<input type="radio" name="group1" value="Nuevo"> Nuevo 
                <input type="radio" name="group1" value="Existente" checked> Existente

			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">Empleado</div>
			  <div class="panel-body">
			  	<input id="name" type="text" name="name" disabled> 
				<input id="lastName" type="text" name="lastname" disabled>
				<button>Buscar</button>
			  </div>
			</div>

			<div class="panel-body">
		  		Equipo:
		  		<input type="radio" name="group2" value="0" checked> No Requiere 
                <input type="radio" name="group2" value="1" > Laptop
                <input type="radio" name="group2" value="2" > PC
			</div>

			<div class="panel-body">
		  		Requiere punto de red?
		  		<input type="radio" name="group3" value="1"> Si 
                <input type="radio" name="group3" value="0" checked> No
			</div>

			<div class="panel-body">
				Area: 
				<select name="area">
				@if($areas)
					@foreach($areas as $area)
					  <option value="{{$area->id}}">{{$area->name}}</option>
					@endforeach
				@endif
				</select>
			</div>

			<div class="panel-body">
				Cuenta de correo / Nombre que usa: 
				<input type="email" name="email">
			</div>

			<div class="panel-body">
				Acceso a internet:
		  		<input type="radio" name="group4" value="1"> Si 
                <input type="radio" name="group4" value="0" checked> No
			</div>

			<div class="panel-body">
				Acceso a carpetas en unidades P y L:
		  		<input type="radio" name="group5" value="1"> Si 
                <input type="radio" name="group5" value="0" checked> No
			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">Conecta</div>
			  <div class="panel-body">
			  	Usuario: <input id="user" type="text" name="user"> 
				
			  </div>
			  <div class="panel-body">
			  	Observacion: <textarea name="observation"></textarea>
			  </div>
			</div>

			<div class="panel-body">
				Conexion a impresora (Indicar el N° de sys):
				<input type="text" name="conection"> 
			</div>

			<div class="panel-body">
				Lista Corporativa: 
				<select name="listaCorporativa">
				@if($corpList)
					@foreach($corpList as $corp)
					  <option value="{{$area->id}}">{{$corp->name}}</option>
					@endforeach
				@endif
				</select>
			</div>

			<div class="panel-body">
				Incluir en directorio corporativo:
				<input type="radio" name="group6" value="1"> Si 
                <input type="radio" name="group6" value="0" checked> No

                LYNC:
				<input type="radio" name="group7" value="1"> Si 
                <input type="radio" name="group7" value="0" checked> No
			</div>

			<div class="panel-body">
				Necesita RPM:
				<input type="radio" name="group8" value="1"> Si 
                <input type="radio" name="group8" value="0" checked> No
			</div>

			<div class="panel-body">
				Nivel de clave telefonica:
				<select name="claveTelefonica">
					<option value="0">Hasta 3 llamadas locales, con salida a celular</option>
					<option value="1">Hasta 5 llamadas locales, con salida a celular</option>
					<option value="1">Hasta 10 llamadas locales, con salida a celular</option>
					<option value="1">Hasta 10 llamadas locales, sin salida a celular</option>
				</select>
			</div>

			<div class="panel-body">
				Requiere anexo:
				<input type="radio" name="group9" value="1"> Si 
                <input type="radio" name="group9" value="0" checked> No

                Ingresa con automovil:
				<input type="radio" name="group10" value="1"> Si 
                <input type="radio" name="group10" value="0" checked> No
			</div>

		</div>
	</div>

	<div class="row">
		@if($form)
		{{Form::hidden('formId',$form->id)}}
		@endif
		{{Form::submit('Confirmar', array('class' => 'btn btn-default'))}}
		
	</div>
	{{Form::close()}}
@stop