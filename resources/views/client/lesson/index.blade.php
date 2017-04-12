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
								<div class="item active">
									<img src="{{ asset('assets/images/project-1/lesson-1/slide-1.jpg') }}" class="img-responsive">
								</div>
								<div class="item">
									<img src="{{ asset('assets/images/project-1/lesson-1/slide-2.jpg') }}" class="img-responsive">
								</div>
							</div>
							<!-- /.carousel-inner -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-7">

			</div>
		</div>
	</div>
@endsection