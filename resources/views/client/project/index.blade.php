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
								@foreach($project->lessons as $lesson)
									<a href="#" class="list-group-item">
										{{ $lesson->name }}
									</a>
								@endforeach
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection