@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<div class="col-md-4 rounded">
				<div class="shadow-sm p-3 bg-white">
					<p class="h3">{{ __('Posts') }}</p>
					<hr>
					<p class="h3">{{ $user->posts->count() }}</p>
				</div>
			</div>

			<div class="col-md-4 rounded">
				<div class="shadow-sm p-3 bg-white">
					<p class="h3">{{ __('Comments') }}</p>
					<hr>
					<p class="h3">{{ $user->comments->count() }}</p>
				</div>
			</div>

			<div class="col-md-4 rounded">
				<div class="shadow-sm p-3 bg-white">
					<p class="h3">{{ __('Likes') }}</p>
					<hr>
					<p class="h3">{{ $user->likes->count() }}</p>
				</div>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-md-6 rounded">
				<div class="shadow-sm bg-white p-3">
					<p class="h4">{{ __('My comments') }}</p>
					<hr>
					<div>
						<div class="list-group">
							@if(!$user->comments->isEmpty())
								@foreach($user->comments()->limit(4)->get() as $comment)
								<a href="{{ route('post.show', ['post' => $comment->post->slug]) }}" class="list-group-item list-group-item-action">
									<strong>{{ $comment->post->title }}</strong>
									<hr>
									<p class="text-muted">{{ $comment->text }}</p>
								</a>
								@endforeach

								<div class="mt-3">
									<a href="{{ route('comment.index') }}" class="btn btn-primary btn-block">{{ __('Settings') }}</a>
								</div>
							@else
							    <div class="alert alert-warning" role="alert">
							        {{ __('No comments found') }}
							    </div>
							@endif
						</div>
					</div>
				</div>
				</div>
				<div class="col-md-6 rounded">
				<div class="shadow-sm bg-white p-3">
					<p class="h4">{{ __('My likes') }}</p>
					<hr>
					<div>
						<div class="list-group">
							@if(!$user->likes->isEmpty())
								@foreach($user->likes()->limit(8)->get() as $post)
									<a href="{{ route('post.show', ['post' => $post->likeable->slug ]) }}" class="list-group-item list-group-item-action">
										{{ $post->likeable->title }}
									</a>

								@endforeach

								<div class="mt-3">
									<a href="{{ route('like.index') }}" class="btn btn-primary btn-block">{{ __('Settings') }}</a>
								</div>
							@else
							    <div class="alert alert-warning" role="alert">
							        {{ __('No likes found') }}
							    </div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

@endsection