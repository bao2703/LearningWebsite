@extends('admin.shared.layout')

@section('content')
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				Slide List
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-responsive table-striped table-hover">
				<thead>
				<tr>
					<th>
						<form action="{{ route('admin.slide.create', $lesson) }}" method="get">
							<button class="btn btn-success btn-sm" type="submit"><i class="fa fa-plus"></i></button>
						</form>
					</th>
					<th>Sort order</th>
					<th>Image</th>
					<th>Task</th>
					<th>Solution</th>
				</tr>
				</thead>
				<tbody>
				@foreach($slides as $slide)
					<tr>
						<td>
							<form action="{{ route('admin.slide.edit', $slide) }}" method="get" style="display: inline">
								<button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
							</form>
							<form action="{{ route('admin.slide.destroy', $slide) }}" method="post" style="display: inline">
								{{ csrf_field() }}
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							</form>
						</td>
						<td>{{ $slide->sort_order }}</td>
						<td>
							<img src="{{ asset($slide->image) }}" class="img-responsive" style="max-height: 150px">
						</td>
						<td>
							{{ $slide->task ? $slide->task->description : ""}}
						</td>
						<td>
							{{ $slide->task ? $slide->task->solution : ""}}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<center>
				{{ $slides->links() }}
			</center>
		</div>
	</div>
@endsection
