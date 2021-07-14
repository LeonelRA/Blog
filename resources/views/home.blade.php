@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">

			<div id="notification" class="d-none"></div>

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

		</div>

		<div class="col-md-4">

			@include('components.sidebar')

		</div>
	</div>
</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		var post = 0;

		Echo.channel('NewPost').listen('CreatePost', e => {
			post += e.post;

			const notificationElement = document.getElementById('notification');

			notificationElement.innerText = 'A new post was created / updated';

			notificationElement.classList.remove('d-none');

			notificationElement.classList.add('alert');
			notificationElement.classList.add('alert-success');

			console.log(post);
		});
	</script>

@endpush