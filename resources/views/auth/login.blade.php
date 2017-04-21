@extends('client.shared.layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-3 col-sm-6">
				@include('shared.error')
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							Login
						</div>
					</div>
					<div class="panel-body">
						<form method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label for="email" class="control-label">Email</label>
										<input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label for="password" class="control-label">Password</label>
										<input class="form-control" type="password" name="password" required>
									</div>
								</div>
							</div>
							<div class="input-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">
										Remember me?
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-primary col-sm-12">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
