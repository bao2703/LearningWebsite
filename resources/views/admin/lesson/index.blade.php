@extends('admin.shared.layout')

@section('content')
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				Lesson List
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-responsive table-striped table-hover">
				<thead>
				<tr>
					<th>
						<form action="{{ route('admin.lesson.create', $project) }}" method="get">
							<button class="btn btn-success btn-sm" type="submit"><i class="fa fa-plus"></i></button>
						</form>
					</th>
					<th>Name</th>
				</tr>
				</thead>
				<tbody>
				@foreach($lessons as $lesson)
					<tr>
						<td>
							<form action="{{ route('admin.lesson.edit', $lesson) }}" method="get">
								<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-pencil"></i></button>
							</form>
							<form action="{{ route('admin.lesson.destroy', $lesson) }}" method="post">
								{{ csrf_field() }}
								<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
							</form>
						</td>
						<td>
							<a href="{{ route('admin.slide.index', $lesson->id) }}">
								{{ $lesson->name }}
							</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
