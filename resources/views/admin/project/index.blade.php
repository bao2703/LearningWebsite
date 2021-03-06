@extends('admin.shared.layout')

@section('content')
	@include('shared.modal.modal')

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				Project List
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
					<th>
						<a href="{{ route('admin.project.create') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal">
							<i class="fa fa-plus"></i>
						</a>
					</th>
					<th>Name</th>
					<th>Title</th>
					<th>Order</th>
				</tr>
				</thead>
				<tbody>
				@foreach($projects as $project)
					<tr>
						<td>
							<a href="{{ route('admin.project.edit', $project) }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">
								<i class="fa fa-pencil"></i>
							</a>
							<a href="{{ route('admin.project.delete', $project) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal">
								<i class="fa fa-trash"></i>
							</a>
						</td>
						<td>
							<a href="{{ route('admin.lesson.index', $project->id) }}">
								{{ $project->name }}
							</a>
						</td>
						<td>{{ $project->title }}</td>
						<td>{{ $project->sort_order }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<center>
				{{ $projects->links() }}
			</center>
		</div>
	</div>
@endsection