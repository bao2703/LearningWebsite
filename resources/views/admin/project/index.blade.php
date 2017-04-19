@extends('admin.shared.layout')

@section('content')
	<div id="modal" class="modal fade action-modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			</div>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				Project List
			</div>
		</div>
		<div class="panel-body">
			<div class="btn-group">
				<a href="{{ route('admin.project.create') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal">
					<i class="fa fa-plus"></i>
				</a>
			</div>
			<table class="table table-bordered table-responsive table-striped table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Id</th>
					<th>Name</th>
					<th>Title</th>
				</tr>
				</thead>
				<tbody>
				@foreach($projects as $project)
					<tr>
						<td>
							<a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">
								<i class="fa fa-pencil"></i>
							</a>
						</td>
						<td>{{ $project->id }}</td>
						<td>{{ $project->name }}</td>
						<td>{{ $project->title }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection