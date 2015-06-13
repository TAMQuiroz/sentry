@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  	<h3>RESUMEN DE LA INFORMACION</h3>
		  </div>
		</div>
	</div>
	@if(Session::has('error'))
		{{Session::get('error')}}
	@endif
	<div class="row">
		<div class="panel panel-default col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading">Empleado</div>
				<div class="panel-body">
					{{$employee->name}} {{$employee->lastname}}
				</div>

				<div class="panel-heading">Jefe</div>
				<div class="panel-body">
					{{$boss->name}} {{$boss->lastname}}
				</div>
			</div>
			<div class="panel-body">
		  		Equipo:
		  		@if($form->equipo==0)
		  			No requiere
		  		@elseif($form->equipo==1)
		  			Laptop
		  		@elseif($form->equipo==2)
		  			PC
		  		@endif
			</div>

			<div class="panel-body">
		  		Requiere punto de red?
		  		@if($form->puntoRed==0)
		  			No
		  		@else
		  			Si
		  		@endif
			</div>

			<div class="panel-body">
				Area: {{$area->name}}
			</div>

			<div class="panel-body">
				SAP - R/3 / Indicar perfil identico o similar a:
				<div>
					Usuario: {{$sapR3->name}}
					<div>
						Justificacion 
					  	<textarea name="sapR3Just" disabled>{{$form->sapR3Just}}</textarea>
				  	</div>
				</div>
			</div>

			<div class="panel-body">
				SAP - Demanda/Planificacion / Indicar perfil identico o similar a:
				<div>
					Usuario: {{$sapDP->name}}
					<div>
						Justificacion 	  	
					  	<textarea name="sapDPJust" disabled>{{$form->sapDPJust}}</textarea>
				  	</div>
				</div>
			</div>

			<div class="panel-body">
				SAP - BW / Indicar perfil identico o similar a:
				<div>
					Usuario: {{$sapBW->name}}
					<div>
						Justificacion 
					  	<textarea name="sapBWJust" disabled>{{$form->sapBWJust}}</textarea>
				  	</div>
				</div>
			</div>


			<div class="panel-body">
				Cuenta de correo / Nombre que usa: 
				{{$form->mail}}
			</div>

			<div class="panel-body">
				Acceso a internet:
				@if($form->accesoInternet==0)
		  			No
		  		@else
		  			Si
		  		@endif
			</div>

			<div class="panel-body">
				Acceso a carpetas en unidades P y L:
				@if($form->accesoCarpetas==0)
		  			No
		  		@else
		  			Si
		  		@endif
			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">Conecta</div>
			  <div class="panel-body">
			  	Usuario: {{$form->usuarioConecta}}
			  </div>
			  <div class="panel-body">
			  	Observacion: {{$form->obsConecta}}
			  </div>
			</div>

			<div class="panel-body">
				Conexion a impresora (Indicar el N° de sys):
				{{$form->conexionImpresora}}
			</div>

			<div class="panel-body">
				Lista Corporativa: 
				{{$corpList->name}}
			</div>

			<div class="panel-body">
				Incluir en directorio corporativo:
				@if($form->incluirDirectorio==0)
		  			No
		  		@else
		  			Si
		  		@endif

                LYNC:
				@if($form->lync==0)
		  			No
		  		@else
		  			Si
		  		@endif
			</div>

			<div class="panel-body">
				Necesita RPM:
				@if($form->rpm==0)
		  			No
		  		@else
		  			Si
		  		@endif
			</div>

			<div class="panel-body">
				Nivel de clave telefonica:
				@if($form->nivelClaveTelefonica==0)
		  			Hasta 3 llamadas locales, con salida a celular
		  		@elseif($form->nivelClaveTelefonica==1)
		  			Hasta 5 llamadas locales, con salida a celular
	  			@elseif($form->nivelClaveTelefonica==2)
		  			Hasta 10 llamadas locales, con salida a celular
	  			@elseif($form->nivelClaveTelefonica==3)
		  			Hasta 10 llamadas locales, sin salida a celular
		  		@endif
			</div>

			<div class="panel-body">
				Requiere anexo:
				@if($form->anexo==0)
		  			No
		  		@else
		  			Si
		  		@endif

                Ingresa con automovil:
                @if($form->automovil==0)
		  			No
		  		@else
		  			Si
		  		@endif
			</div>
		</div>
	</div>
		
	<div class="row">
		@if($form->status != 1)
		{{Form::open(array('route' => 'business_partner.requirement.new','method'=>'GET'))}}
			{{Form::hidden('formId', $form->id)}}
			{{Form::submit('Modificar', array('class' => 'btn btn-default'))}}
		{{Form::close()}}		

		{{Form::open(array('route' => 'business_partner.requirement.send'))}}
			{{Form::hidden('formId', $form->id)}}
			{{Form::submit('Terminar', array('class' => 'btn btn-default'))}}
		{{Form::close()}}		
		@else
		<a href="{{route("home")}}"><button>Regresar</button></a>
		@endif
		
	</div>
@stop