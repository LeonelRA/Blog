    <div class="col-md-12 col-lg-6 mb-3">
        <div class="card @if($shadow) border-0 shadow-sm @else border @endif">
            @empty(!$post->image)
                <img class="{{ $post->name }}" src="{{ asset('/images/'.$post->image->path) }}" alt="Card image cap">
            @endempty
            <div class="card-body">
                <h5 class="card-title">
                	<strong>{{ $post->title }}</strong>
                </h5>
                <hr>
                <p class="card-text text-muted">{!! $post->excerpt !!}</p>
                <a href="{{ route('post.show', ['post' => $post->slug]) }}" class="btn btn-primary">{{ __('Read More') }}</a>

				<div class="mt-3 text-muted">
					<span>
						<i class="far fa-calendar mr-1"></i>
						{{ $post->published_at->diffForHumans() }}
					</span>
					<span class="mx-3">
						<i class="far fa-comment mr-1"></i>
						{{ $post->comments->count() }}
					</span>
					<span>
						<i class="far fa-heart mr-1"></i>
						{{ $post->likes->count() }}
					</span>
				</div>
            </div>
        </div>
    </div>