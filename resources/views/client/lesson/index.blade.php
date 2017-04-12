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
						<div id="lesson-slide" class="carousel slide" data-ride="carousel">
							<!-- carousel-inner -->
							<div class="carousel-inner" role="listbox">
								@foreach($lesson->slides as $slide)
									<div class="item">
										<img src="{{ asset($slide->image) }}" class="img-responsive">
									</div>
								@endforeach
							</div>
							<!-- /.carousel-inner -->
						</div>
					</div>
				</div>
				<form id="" class="editor-form">
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
					<div class="form-group">
						<input class="col-xs-12 form-control" id="user-input">
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
            var input = $('#user-input').val();
            var result = $('#result-content');
            result.ready(function() {
                result.contents().find("body").html(input);
            });
        });
	</script>
@endsection