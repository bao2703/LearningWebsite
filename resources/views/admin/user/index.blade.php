@extends('admin.shared.layout')

@section('content')
	@include('shared.modal.modal')

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				User List
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<form class="col-sm-3 form-horizontal pull-right" method="get">
					<div class="form-group">
						<label for="search" class="col-sm-3 control-label">Search</label>
						<div class="col-sm-9">
							<input class="form-control" name="search" value="{{ $search }}">
						</div>
					</div>
				</form>
			</div>
			<table class="table table-bordered table-responsive table-striped table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<tr style="color: {{ $user->isAdmin ? 'red' : ''}}">
						<td>
							@if(Auth::user() != $user)
								<form action="{{ route('admin.user.destroy', $user) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</button>
								</form>
							@endif
						</td>
						<td>
							{{ $user->name }}
						</td>
						<td>
							{{ $user->email }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<center>
				{{ $users->links() }}
			</center>
		</div>
	</div>
@endsection