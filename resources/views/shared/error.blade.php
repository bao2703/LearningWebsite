@if (count($errors) > 0)
	<div class="alert alert-danger text-center">
		@foreach ($errors->all() as $error)
			<div>{{ $error }}</div>
		@endforeach
	</div>
@endif