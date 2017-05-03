@extends('client.shared.layout')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-2 col-sm-5">
				@foreach($projects as $project)
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>{{ $project->name }}</h4>
							<small>{{ $project->title }}</small>
						</div>
						<div class="panel-body">
							<div class="list-group">
								@foreach($project->lessons as $i => $lesson)
									<a href="{{ route('lesson.show', $lesson) }}" class="list-group-item">
										{{ $i + 1 }}. {{ $lesson->name }}
									</a>
								@endforeach
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col-sm-3">
				<div class="project-screenshot">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<img src="{{ asset('storage/images/anna-screenshot.png') }}" style="width: 100%">
				<form style="margin-top: 25px">
					<div class="form-group">
						<button class="btn btn-primary btn-block">Restart</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<style>
		.project-screenshot {
			height: 20px;
			background: #444;
			border-radius: 5px 5px 0px 0px;
			padding-left: 5px;
		}

		.project-screenshot span {
			border-radius: 100%;
			width: 8px;
			height: 8px;
			background: #888;
			display: inline-block;
			margin-left: 3px;
		}
	</style>
@endsection