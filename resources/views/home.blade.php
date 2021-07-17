@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">

			<div id="notification" class="d-none"></div>

			@include('components.posts.list', ['post' => $posts])

		</div>

		<div class="col-md-4">

			@include('components.sidebar')

		</div>
	</div>
</div>
@endsection
