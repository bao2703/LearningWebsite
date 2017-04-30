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
			<div class="btn-group">
				<a href="{{ route('admin.project.create') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal">
					<i class="fa fa-plus"></i>
				</a>
			</div>
			<table class="table table-bordered table-responsive table-striped table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Title</th>
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
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection