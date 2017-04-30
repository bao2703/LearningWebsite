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
					<th>Sort order</th>
					<th>Image</th>
					<th>Task</th>
					<th>Solution</th>
				</tr>
				</thead>
				<tbody>
				@foreach($slides as $slide)
					<tr>
						<td>{{ $slide->sort_order }}</td>
						<td>
							<img src="{{ asset($slide->image) }}" class="img-responsive" style="max-height: 150px">
						</td>
						@if($slide->task)
							<td>{{ $slide->task->description }}</td>
							<td>{{ $slide->task->solution }}</td>
						@else
							<td></td>
							<td></td>
						@endif
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection