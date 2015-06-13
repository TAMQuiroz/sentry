@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  {{ Form::open(array('route' => 'signup.post')) }}
		    Sign Up
		    <div class="input-group">
		    	<label for="name">Nombre</label>
				<input name="name" id="name" type="text" class="form-control" placeholder="Nombre">
			</div>
		    <div class="input-group">
		    	<label for="email">E-mail</label>
				<input name="email" id="email" type="email" class="form-control" placeholder="E-mail">
			</div>
			<div class="input-group">
				<label for="password">Password</label>
				<input name="password" id="password" type="password" class="form-control" placeholder="Password">
			</div>
			{{ Form::select('role', [
			   '1' => 'Business Partner',
			   '2' => 'Jefe',
			   '3' => 'Colaborador Infraestructura',
			   '4' => 'Colaborador Administrativo',
			   '5' => 'Autorizador'],
			   null,
			   ['class'=>'form-control']
			) }}
			{{Form::submit('Registrarse', array('class' => 'btn btn-default'))}}
		  {{Form::close()}}
		  </div>

		</div>
	</div>
@stop