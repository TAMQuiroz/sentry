@extends('layouts.default')

@section('extra_css')
	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery.js') }}

@stop

@section('content')
	@foreach($data as $d)
		<h1>Permisos SAP para empleado(a) : {{$d["employee"]->name}}  {{$d["employee"]->lastname}}</h1>
	@endforeach
  {{Form::open(array('route' => 'enabler.updateRequirement'))}}
	<table class="table table-hover">
      <caption></caption>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Justificacion</th>
          <th>Visto Bueno</th>
        </tr>
      </thead>
      <tbody>
      	@foreach($data as $d)
      		@foreach($d["reqs"] as $req)
      			<tr>
              <td>{{$req['name']}}</td>
      				<td>{{$req["description"]}}</td>
      				<td>
      					<select name = '{{$req["id"]}}' > 
      						<option value="0" selected>No</option>
      						<option value="1" >Si</option>
      					</select>
      				</td>
      			</tr>
      		@endforeach
      	@endforeach
      </tbody>
    </table>
  {{Form::submit('Guardar Cambios', array('class' => 'btn btn-default'))}}
  {{Form::close()}}
@stop