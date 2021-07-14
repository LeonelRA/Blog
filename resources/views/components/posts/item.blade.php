{{-- 	<div class="rounded row bg-white mb-3">
			
			@empty(!$post->image)
			<div class="col-md-3 p-0 d-flex justify-content-center overflow-hidden">
				<img src="{{ asset('/images/'.$post->image->path) }}" class="rounded" style="height: 240px;">
			</div>
			@endempty

		<div class="@empty(!$post->image) col-md-9 @else col-md-12 @endempty pl-3 py-4 pr-5">
			<div>
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
			<hr>
			<div>
				<h4><strong>{{ $post->title }}</strong></h4>
				<p>{!! $post->excerpt !!}</p>
				<a href="{{ route('post.show', ['post' => $post->slug]) }}" class="btn btn-lr">Read More</a>
			</div>
		</div>
	</div> --}}

    <div class="col-md-6 mb-3">
        <div class="card border-0 shadow-sm">
            @empty(!$post->image)
                <img class="{{ $post->name }}" src="{{ asset('/images/'.$post->image->path) }}" alt="Card image cap">
            @endempty
            <div class="card-body">
                <h5 class="card-title">
                	<strong>{{ $post->title }}</strong>
                </h5>
                <hr>
                <p class="card-text text-muted">{!! $post->excerpt !!}</p>
                <a href="{{ route('post.show', ['post' => $post->slug]) }}" class="btn btn-lr">{{ __('Read More') }}</a>

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