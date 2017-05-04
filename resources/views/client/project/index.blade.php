@extends('client.shared.layout')

@section('content')
	<div class="container">
		<div class="row">
			@foreach($projects as $project)
				<div class="col-sm-offset-2 col-sm-8">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>{{ $project->name }}</h4>
							<small>{{ $project->title }}</small>
						</div>
						<div class="panel-body">
							<div class="list-group">
								@foreach($project->lessons()->orderBy('sort_order')->get() as $i => $lesson)
									<a href="{{ route('lesson.show', $lesson) }}" class="list-group-item">
										{{ $i + 1 }}. {{ $lesson->name }}
									</a>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection