	@if(!$posts->isEmpty())

		<div class="row">
			@foreach($posts as $post)

				@include('components.posts.item')

			@endforeach	

		</div>

		{{ $posts->links() }}

	@else

        <div class="alert alert-warning" role="alert">
            {{ __('No post found') }}
        </div>
        
	@endif