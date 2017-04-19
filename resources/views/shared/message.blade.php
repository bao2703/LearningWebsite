@if(session('message'))
	<p class="text-center alert {{ session('alert-class', 'alert-info') }}">
		{{ session('message') }}
	</p>
@endif