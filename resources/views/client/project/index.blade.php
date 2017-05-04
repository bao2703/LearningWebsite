@extends('client.shared.layout')

@section('content')
	<div class="container">
		@foreach($projects as $project)
			<div class="row">
				<div class="col-sm-offset-1 col-sm-7">
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
				</div>
				<div class="col-sm-3">
					<div class="project-screenshot">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<img src="{{ asset('storage/images/anna-screenshot.png') }}" style="width: 100%">
					<form style="margin-top: 15px">
						<div class="form-group">
							<button class="btn btn-primary btn-block">Restart</button>
						</div>
					</form>
				</div>
			</div>
		@endforeach
	</div>
@endsection