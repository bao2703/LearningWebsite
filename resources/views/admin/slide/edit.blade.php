@extends('admin.shared.layout')

@section('content')
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				Edit Slide
			</div>
		</div>
		<div class="panel-body">
			<form action="{{ route('admin.slide.update', $slide) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						@include('shared.message')
						@include('shared.error')
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-5">
						<div class="form-group">
							<label for="image">Image</label>
							<input id="file" type="file" name="image" data-show-upload="false" data-show-remove="true"
							       data-allowed-file-extensions='["jpeg", "gif", "png", "jpg"]'/>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label for="sort_order">Sort order</label>
							<input type="text" class="form-control" name="sort_order" value="{{ $slide->sort_order }}"
							       required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<label for="task">Task</label>
							<textarea class="form-control vresize" rows="5"
							          name="task">{{ $slide->task ? $slide->task->description : ""}}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<label for="solution">Solution</label>
							<input type="text" class="form-control" name="solution"
							       value="{{ $slide->task ? $slide->task->solution : "" }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Edit</button>
							<a href="{{ route('admin.slide.index', $slide->lesson) }}" class="btn btn-info">Back to
								list</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#file").fileinput();
		});
	</script>
@endsection
