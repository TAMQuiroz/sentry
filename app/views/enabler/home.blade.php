@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	<h1>Home del Autorizador</h1>
	<table class="table table-hover">
      <caption></caption>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Area</th>
        </tr>
      </thead>
      <tbody>
      	@if($data)
	      	@foreach($data as $d)
	      	<tr>

	          <td><a href="{{route('home')}}/enabler/requirement/{{$d["formID"]}}">{{$d["employee"]->name}}</a></td>
	          <td>{{$d["employee"]->lastname}}</td>
	          <td>{{$d["area"]->description}}</td>
	        </tr>
	      	@endforeach
	      @endif
      </tbody>
    </table>
@stop