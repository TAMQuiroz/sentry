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

	{{Form::open(array('route' => 'business_partner.requirement.new.post'))}}
	<div class="row">
		<div class="panel panel-default col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading">Empleado</div>
				<div class="panel-body">
					<select name="employee">
					@if(isset($form))
						@if($employees)
							<option value="{{$employee->id}}" selected>{{$employee->name}} {{$employee->lastname}}</option>
							@foreach($employees as $employee)
							  <option value="{{$employee->id}}">{{$employee->name}} {{$employee->lastname}}</option>
							@endforeach
						@endif
					@else
						@if($employees)
							@foreach($employees as $employee)
							  <option value="{{$employee->id}}">{{$employee->name}} {{$employee->lastname}}</option>
							@endforeach
						@endif
					@endif
					</select>
				</div>
			</div>

			<div class="panel-body">
		  		Equipo:
		  		@if(isset($form) && $form->equipo == 0)
		  		<input type="radio" name="group2" value="0" checked> No Requiere 
                <input type="radio" name="group2" value="1" > Laptop
                <input type="radio" name="group2" value="2" > PC
                @elseif(isset($form) && $form->equipo == 1)
                <input type="radio" name="group2" value="0" > No Requiere 
                <input type="radio" name="group2" value="1" checked> Laptop
                <input type="radio" name="group2" value="2" > PC
               	@elseif(isset($form) && $form->equipo == 2)
		  		<input type="radio" name="group2" value="0" > No Requiere 
                <input type="radio" name="group2" value="1" > Laptop
                <input type="radio" name="group2" value="2" checked> PC
                @else
		  		<input type="radio" name="group2" value="0" checked> No Requiere 
                <input type="radio" name="group2" value="1" > Laptop
                <input type="radio" name="group2" value="2" > PC
                @endif
			</div>

			<div class="panel-body">
		  		Requiere punto de red?
		  		@if(isset($form) && $form->puntoRed == 0)
		  		<input type="radio" name="group3" value="1"> Si 
                <input type="radio" name="group3" value="0" checked> No
                @elseif(isset($form) && $form->puntoRed == 1)
                <input type="radio" name="group3" value="1" checked> Si 
                <input type="radio" name="group3" value="0"> No
                @else
                <input type="radio" name="group3" value="1"> Si 
                <input type="radio" name="group3" value="0" checked> No
                @endif
			</div>

			<div class="panel-body">
				Area: 
				<select name="area">
				@if(isset($form))
					@if($areas)
						<option value="{{$area->id}}" selected>{{$area->name}}</option>
						@foreach($areas as $area)
						  <option value="{{$area->id}}">{{$area->name}}</option>
						@endforeach
					@endif
				@else
					@if($areas)
						@foreach($areas as $area)
						  <option value="{{$area->id}}">{{$area->name}}</option>
						@endforeach
					@endif
				@endif
				</select>
			</div>

			<div class="panel-body">
				SAP - R/3 / Indicar perfil identico o similar a:
				<div>
					Usuario: 
					<select name="sapR3">
					@if($positions)
						@if(isset($form))
							<option value="{{$sapR3->id}}" selected>{{$sapR3->name}}</option>
						@endif
						@foreach($positions as $position)
						  <option value="{{$position->id}}">{{$position->name}}</option>
						@endforeach
					@endif

					</select>
					Justificacion 
				  	@if(isset($form))
				  	<textarea name="sapR3Just">{{$form->sapR3Just}}</textarea>
				  	@else
				  	<textarea name="sapR3Just"></textarea>
				  	@endif

				</div>
			</div>

			<div class="panel-body">
				SAP - Demanda/Planificacion / Indicar perfil identico o similar a:
				<div>
					Usuario: 
					<select name="sapDP">
					@if($positions)
						@if(isset($form))
							<option value="{{$sapDP->id}}">{{$sapDP->name}}</option>
						@endif
						@foreach($positions as $position)
						  <option value="{{$position->id}}">{{$position->name}}</option>
						@endforeach
					@endif
					
					</select>
					Justificacion 
				  	@if(isset($form))
				  	<textarea name="sapDPJust">{{$form->sapDPJust}}</textarea>
				  	@else
				  	<textarea name="sapDPJust"></textarea>
				  	@endif
				</div>
			</div>

			<div class="panel-body">
				SAP - BW / Indicar perfil identico o similar a:
				<div>
					Usuario: 
					<select name="sapBW">
					@if($positions)
						@if(isset($form))
							<option value="{{$sapBW->id}}">{{$sapBW->name}}</option>
						@endif
						@foreach($positions as $position)
						  <option value="{{$position->id}}">{{$position->name}}</option>
						@endforeach
					@endif
					</select>
					Justificacion 
				  	@if(isset($form))
				  	<textarea name="sapBWJust">{{$form->sapBWJust}}</textarea>
				  	@else
				  	<textarea name="sapBWJust"></textarea>
				  	@endif
				</div>
			</div>

			<div class="panel-body">
				Cuenta de correo / Nombre que usa: 
				@if(isset($form))
				<input type="email" name="email" value="{{$form->mail}}">
				@else
				<input type="email" name="email">
				@endif
			</div>

			<div class="panel-body">
				Acceso a internet:
				@if(isset($form) && $form->accesoInternet == 1)
		  		<input type="radio" name="group4" value="1" checked> Si 
		  		<input type="radio" name="group4" value="0"> No
		  		@else
		  		<input type="radio" name="group4" value="1"> Si 
                <input type="radio" name="group4" value="0" checked> No
                @endif
			</div>

			<div class="panel-body">
				Acceso a carpetas en unidades P y L:
				@if(isset($form) && $form->accesoCarpetas == 1)
		  		<input type="radio" name="group5" value="1" checked> Si 
                <input type="radio" name="group5" value="0" > No
                @else
		  		<input type="radio" name="group5" value="1"> Si 
                <input type="radio" name="group5" value="0" checked> No
                @endif
			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">Conecta</div>
			  <div class="panel-body">
			  Usuario:
			  @if(isset($form))
			  	<input id="user" type="text" name="user" value="{{$form->usuarioConecta}}"> 
			  @else
				<input id="user" type="text" name="user"> 
			  @endif
			  </div>
			  <div class="panel-body">
			  	Observacion: 
			  	@if(isset($form))
			  	<textarea name="observation">{{$form->obsConecta}}</textarea>
			  	@else
			  	<textarea name="observation"></textarea>
			  	@endif
			  </div>
			</div>

			<div class="panel-body">
				Conexion a impresora (Indicar el N° de sys):
				@if(isset($form))
				<input type="text" name="conection" value="{{$form->conexionImpresora}}"> 
				@else
				<input type="text" name="conection">
				@endif
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
				@if(isset($form) && $form->incluirDirectorio == 1)
				<input type="radio" name="group6" value="1" checked> Si 
                <input type="radio" name="group6" value="0" > No
                @else
				<input type="radio" name="group6" value="1"> Si 
                <input type="radio" name="group6" value="0" checked> No
                @endif

                LYNC:
                @if(isset($form) && $form->lync == 1)
				<input type="radio" name="group7" value="1" checked> Si 
                <input type="radio" name="group7" value="0" > No
                @else
				<input type="radio" name="group7" value="1"> Si 
                <input type="radio" name="group7" value="0" checked> No
                @endif
			</div>

			<div class="panel-body">
				Necesita RPM:
				@if(isset($form) && $form->rpm == 1)
				<input type="radio" name="group8" value="1" checked> Si 
                <input type="radio" name="group8" value="0" > No
                @else
				<input type="radio" name="group8" value="1"> Si 
                <input type="radio" name="group8" value="0" checked> No
                @endif
			</div>

			<div class="panel-body">
				Nivel de clave telefonica:
				<select name="claveTelefonica">
					@if(isset($form))
						@if($form->nivelClaveTelefonica == 0)
						<option value="0" selected>Hasta 3 llamadas locales, con salida a celular</option>
						<option value="1">Hasta 5 llamadas locales, con salida a celular</option>
						<option value="2">Hasta 10 llamadas locales, con salida a celular</option>
						<option value="3">Hasta 10 llamadas locales, sin salida a celular</option>
						@elseif($form->nivelClaveTelefonica == 1)
						<option value="0">Hasta 3 llamadas locales, con salida a celular</option>
						<option value="1" selected>Hasta 5 llamadas locales, con salida a celular</option>
						<option value="2">Hasta 10 llamadas locales, con salida a celular</option>
						<option value="3">Hasta 10 llamadas locales, sin salida a celular</option>
						@elseif($form->nivelClaveTelefonica == 2)
						<option value="0">Hasta 3 llamadas locales, con salida a celular</option>
						<option value="1">Hasta 5 llamadas locales, con salida a celular</option>
						<option value="2" selected>Hasta 10 llamadas locales, con salida a celular</option>
						<option value="3">Hasta 10 llamadas locales, sin salida a celular</option>
						@elseif($form->nivelClaveTelefonica == 3)
						<option value="0">Hasta 3 llamadas locales, con salida a celular</option>
						<option value="1">Hasta 5 llamadas locales, con salida a celular</option>
						<option value="2">Hasta 10 llamadas locales, con salida a celular</option>
						<option value="3" selected>Hasta 10 llamadas locales, sin salida a celular</option>
						@endif
					@else
					<option value="0">Hasta 3 llamadas locales, con salida a celular</option>
					<option value="1">Hasta 5 llamadas locales, con salida a celular</option>
					<option value="2">Hasta 10 llamadas locales, con salida a celular</option>
					<option value="3">Hasta 10 llamadas locales, sin salida a celular</option>
					@endif
				</select>
			</div>

			<div class="panel-body">
				Requiere anexo:
				@if(isset($form) && $form->anexo == 1)
				<input type="radio" name="group9" value="1" checked> Si 
                <input type="radio" name="group9" value="0" > No
                @else
				<input type="radio" name="group9" value="1" > Si 
                <input type="radio" name="group9" value="0" checked> No
                @endif

                Ingresa con automovil:
                @if(isset($form) && $form->automovil == 1)
				<input type="radio" name="group10" value="1" checked> Si 
                <input type="radio" name="group10" value="0" > No
                @else
				<input type="radio" name="group10" value="1"> Si 
                <input type="radio" name="group10" value="0" checked> No
                @endif
			</div>

		</div>
	</div>

	<div class="row">
		@if(isset($form))
			@if($form != null)
				{{Form::hidden('formId', $form->id)}}
			@endif
		@endif
		{{Form::submit('Confirmar', array('class' => 'btn btn-default'))}}
		
	</div>
	{{Form::close()}}
@stop