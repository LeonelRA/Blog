@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-12 col-lg-8">

			@include('components.posts.list', ['posts' => $posts, 'shadow' => true])

		</div>

		<div class="col-md-12 col-lg-4">

			@include('components.sidebar.list', ['shadow' => true])

		</div>
	</div>
</div>
@endsection
