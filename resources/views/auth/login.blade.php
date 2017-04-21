@extends('client.shared.layout')

@section('content')
	<form method="post">
		{{ csrf_field() }}
		<input type="email" name="email">
		<input type="text" name="password">
		<button type="submit">Login</button>
	</form>
@endsection
