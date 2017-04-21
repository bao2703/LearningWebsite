@extends('client.shared.layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-3 col-sm-6">
				@include('shared.error')
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							Register
						</div>
					</div>
					<div class="panel-body">
						<form method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
										<label for="first_name" class="control-label">First name</label>
										<input class="form-control" type="text" name="first_name" autofocus
										       value="{{ old('first_name') }}" required>
									</div>
									<div class="col-sm-6">
										<label for="last_name" class="control-label">Last name</label>
										<input class="form-control" type="text" name="last_name"
										       value="{{ old('last_name') }}" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label for="email" class="control-label">Email</label>
										<input class="form-control" type="email" name="email" value="{{ old('email') }}"
										       required>
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
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label for="password_confirmation" class="control-label">Password
											confirmation</label>
										<input class="form-control" type="password" name="password_confirmation"
										       required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-primary col-sm-12">Register</button>
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

