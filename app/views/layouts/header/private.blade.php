<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('home')}}">
		<button type="button" class="btn btn-default">
		  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
		</button>
		{{Auth::user()->name}}
		<a href="{{route('logout')}}" id="login_btn">LOG OUT</a>
      </a>
    </div>
  </div>
</nav>