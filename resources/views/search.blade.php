@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3 class="mb-3">{{ __("Searching : {$search}") }}</h3>

			@if(!$posts->isEmpty())

				<div class="row">
					@foreach($posts as $post)

						@include('components.posts.item')

					@endforeach	

					{{ $posts->links() }}	
				</div>
				
			@else

                <div class="alert alert-warning" role="alert">
                    {{ __('No post found') }}
                </div>

			@endif
		</div>

 		<div class="col-md-4">

 			@include('components.sidebar')

		</div> 
	</div>
</div>
@endsection
