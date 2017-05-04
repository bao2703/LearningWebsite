<ul class="nav navbar-nav navbar-right">
	<!-- authentication links -->
	@if (Auth::guest())
		<li><a href="{{ route('login') }}">Login</a></li>
		<li><a href="{{ route('register') }}">Register</a></li>
	@else
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				@if(Auth::user()->isAdmin)
					<li>
						<a href="{{ route('admin.home') }}">
							Admin
						</a>
					</li>
				@endif
				<li>
					<a onclick="event.preventDefault();$('#logout-form').submit();">
						Logout
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</li>
	@endif
	<!-- /.authentication links -->
</ul>