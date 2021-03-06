@extends('admin.shared.layout')

@section('content')
	@include('shared.modal.modal')

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				Lesson List
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
						<form action="{{ route('admin.lesson.create', $project) }}" method="get">
							<button class="btn btn-success btn-sm" type="submit"><i class="fa fa-plus"></i></button>
						</form>
					</th>
					<th>Name</th>
					<th>Order</th>
				</tr>
				</thead>
				<tbody>
				@foreach($lessons as $lesson)
					<tr>
						<td>
							<form action="{{ route('admin.lesson.edit', $lesson) }}" method="get" style="display: inline">
								<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-pencil"></i></button>
							</form>
							<form action="{{ route('admin.lesson.destroy', $lesson) }}" method="post" style="display: inline">
								{{ csrf_field() }}
								<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
							</form>
							<a href="{{ route('admin.lesson.show', $lesson) }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal">
								<i class="fa fa-list"></i>
							</a>
						</td>
						<td>
							<a href="{{ route('admin.slide.index', $lesson->id) }}">
								{{ $lesson->name }}
							</a>
						</td>
						<td>{{ $lesson->sort_order }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<center>
				{{ $lessons->links() }}
			</center>
		</div>
	</div>
@endsection
