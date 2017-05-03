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
								@foreach($lesson->slides()->orderBy('sort_order')->get() as $slide)
									<div class="item" data-id="{{ $slide->id }}" style="min-height: 250px">
										<img src="{{ asset($slide->image) }}" class="img-responsive">
										<div class="col-xs-12 text-center" id="task-content">
											@if($slide->task)
												<div id="task-{{ $slide->task->id }}" style="color: black">
													<h1>CHECKPOINT</h1>
													<div class="col-sm-offset-1 col-sm-10">
														@if($user->tasks->contains($slide->task->id))
															<i class="fa fa-check fa-2x" style="color: green;"></i>
														@else
															<i class="fa fa-close fa-2x" style="color: red"></i>
														@endif
														{{ $slide->task->description }}
													</div>
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
						<div class="panel-heading">
							<div class="panel-title">
								Type your code here
							</div>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<textarea id="code">{!! $user_progress !!}</textarea>
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
							<iframe id="preview-frame" class="embed-responsive-item"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		var mixedMode = {
			name: "htmlmixed",
			scriptTypes: [{
				matches: /\/x-handlebars-template|\/x-mustache/i,
				mode: null
			}, {
				matches: /(text|application)\/(x-)?vb(a|script)/i,
				mode: "vbscript"
			}]
		};

		var editor = CodeMirror.fromTextArea($("#code")[0], {
			mode: mixedMode,
			lineNumbers: true,
			tabMode: "indent",
			theme: "dracula",
			indentUnit: 2
		});

		editor.on('change', function(e) {
			$(".editor-form").submit();
		});

		$(".editor-form").submit(function(e) {
			e.preventDefault();
			var userProgress = editor.getValue();
			var previewFrame = document.getElementById('preview-frame');
			var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;
			preview.open();
			preview.write(editor.getValue());
			preview.close();

			$.ajax({
				url: '{{ route('task.check') }}',
				type: "POST",
				data: {
					lesson_id: '{{ $lesson->id }}',
					user_progress: userProgress
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function(response) {
					var successTask = response.success_task;
					console.log(successTask);
					successTask.forEach(function(item) {
						var icon = $('#task-' + item).find('div').find('i');
						icon.removeClass('fa-close').addClass('fa-check').css("color", "green");
					});
				}
			});
		}).submit();
	</script>
@endsection
