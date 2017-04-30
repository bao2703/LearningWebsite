@extends('admin.shared.layout')

@section('content')
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				Create Slide
			</div>
		</div>
		<div class="panel-body">
			<form action="{{ route('admin.slide.store', $lesson->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-offset-1 col-sm-5">
						<div class="form-group">
							<label for="image">Image</label>
							<input id="file" type="file" class="form-control" name="image">
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label for="sort_order">Sort order</label>
							<input type="text" class="form-control" name="sort_order">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<label for="task">Task</label>
							<textarea class="form-control vresize" rows="7" name="task"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<label for="solution">Solution</label>
							<textarea class="form-control vresize" rows="7" name="solution"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Create</button>
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
