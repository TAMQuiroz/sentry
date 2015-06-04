@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<div class="row">
		<div class="panel panel-default col-md-4 col-md-offset-4">
		  <div class="panel-body">
		  {{Form::open()}}
		    Login
		    <div class="input-group">
			    <label for="email">E-mail</label>
				<input name="email" type="text" class="form-control" placeholder="E-mail" aria-describedby="basic-addon2">
			</div>
			<div class="input-group">
				<label for="password">Password</label>
			  <input name="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
			</div>
			{{Form::submit('Log in', array('class' => 'btn btn-default'))}}
		  {{Form::close()}}
		  </div>

		</div>
	</div>
@stop