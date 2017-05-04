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
			</div>
		@endforeach
	</div>
@endsection