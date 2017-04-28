@extends('client.shared.layout')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-5">
				<div class="panel panel-primary">
					<div class="panel-heading clearfix">
						<h6 class="panel-title pull-left" style="padding-top: 7.5px;">
							{{ $lesson->name }}
						</h6>
						<div class="btn-group pull-right">
							<button class="btn btn-info btn-sm" href="#lesson-slide" role="button" data-slide="prev">
								<i class="fa fa-chevron-left"></i>
							</button>
							<button class="btn btn-info btn-sm" href="#lesson-slide" role="button" data-slide="next">
								<i class="fa fa-chevron-right"></i>
							</button>
						</div>
					</div>
					<div class="panel-body">
						<div id="lesson-slide" class="carousel" data-ride="carousel" data-interval="false">
							<!-- carousel-inner -->
							<div class="carousel-inner" role="listbox">
								@foreach($lesson->slides as $slide)
									<div class="item" data-id="{{ $slide->id }}">
										<img src="{{ asset($slide->image) }}" class="img-responsive">
										<div class="col-xs-12 text-center" id="task-content">
											@if($slide->task)
												<div id="task-{{ $slide->task->id }}" style="color: white">
													<h1>CHECKPOINT</h1>
													<h3 class="col-sm-offset-1 col-sm-10">
														@if (false)
															<i class="fa fa-check"></i>
														@else
															<i class="fa fa-close"></i>
														@endif
														{{ $slide->task->description }}
													</h3>
												</div>
											@endif
										</div>
									</div>
								@endforeach
							</div>
							<!-- /.carousel-inner -->
						</div>
					</div>
				</div>
				<form action="" method="POST" class="editor-form">
					<div class="panel panel-success">
						<div class="panel-heading clearfix">
							<h6 class="panel-title pull-left" style="padding-top: 7.5px;">
								Type your code here
							</h6>
							<div class="btn-group pull-right">
								<button class="btn btn-success btn-sm" type="submit">
									Run
								</button>
							</div>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<textarea class="form-control vresize" rows="7"
								          id="user-input">{{ $user_process }} {{$success_task}}</textarea>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-7">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h6 class="panel-title">
							Result
						</h6>
					</div>
					<div class="panel-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe id="result-content" class="embed-responsive-item"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		$(".editor-form").submit(function(e) {
			e.preventDefault();
			var userProcess = $('#user-input').val();
			var result = $('#result-content');
			result.ready(function() {
				result.contents().find("body").html(userProcess);
			});
			var currSlideId = $('.carousel-inner').find('.active').data("id");
			$.ajax({
				url: '{{ route('task.check') }}',
				type: "POST",
				data: {
					lesson_id: '{{ $lesson->id }}',
					slide_id: currSlideId,
					user_process: userProcess
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function(response) {
					var successTask = response.success_task;
					successTask.forEach(function(item) {
						//console.log(item);
						$('#task-' + item).html("")
					});
				}
			});
		});
	</script>
@endsection
