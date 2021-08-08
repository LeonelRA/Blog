@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-12 col-lg-8">
			
			<h3 class="mb-3">{{ __("{$type} : {$search}") }}</h3>

			@include('components.posts.list', ['posts' => $posts, 'shadow' => true])
			
		</div>

 		<div class="col-md-12 col-lg-4">

 			@include('components.sidebar.list', [ 'shadow' => true ])

		</div> 
	</div>
</div>
@endsection
