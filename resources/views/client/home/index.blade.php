@extends('client.shared.layout')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8 text-center">
				<h1>
					Learn to code awesome websites in HTML, CSS, and JavaScript
				</h1>
				<h2>
					Dash is a fun and free online course that teaches you the basics of web development through
					projects
					you can do in your browser.
				</h2>
				<div class="form-group" style="margin-top: 30px">
					<a class="btn btn-success btn-lg" href="{{ route('project.index') }}">
						START LEARNING
					</a>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<h1>HTML5</h1>
						Learn the right way to code HTML, the building block of the web. Design beautifully modern sites and learn how to balance layout for content and navigation.
					</div>
					<div class="col-sm-4">
						<h1>CSS3</h1>
						Create your first fully styled landing page, complete with multi-column layouts, modern navigation elements, and mobile responsive design.
					</div>
					<div class="col-sm-4">
						<h1>JAVASCRIPT</h1>
						Create dynamic interfaces that handle user events and add UI effects such as animations and drop-and-drop to surprise and delight your site’s visitors.
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection