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
					<th>Id</th>
					<th>Name</th>
					<th>Title</th>
				</tr>
				</thead>
				<tbody>
				@foreach($lessons as $lesson)
					<tr>
						<td>{{ $lesson->id }}</td>
						<td>{{ $lesson->name }}</td>
						<td>{{ $lesson->title }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
