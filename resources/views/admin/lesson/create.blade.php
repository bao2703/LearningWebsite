@extends('admin.shared.layout')

@section('content')
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				Create Lesson
			</div>
		</div>
		<div class="panel-body">
			<form action="{{ route('admin.lesson.store', $project) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						@include('shared.message')
						@include('shared.error')
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-8">
						<div class="form-group">
							<label>Name</label>
							<input class="form-control" name="name" value="{{ old('name') }}" required>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label>Order</label>
							<input class="form-control" name="sort_order" value="{{ old('sort_order') }}" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<label>Content</label>
							<textarea id="code" class="form-control" name="content">{{ old('content') }}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="form-group">
							<button type="submit" class="btn btn-success">Create</button>
							<a href="{{ route('admin.lesson.index', $project) }}" class="btn btn-info">Back to list</a>
						</div>
					</div>
				</div>
			</form>
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
			$("#code").html(e.getValue());
		});
	</script>
@endsection
