@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mb-3">

            <div class="shadow-sm bg-white p-5">

                <div class="d-flex justify-content-between">
                    <h2 class="h1 mb-4">{{ $post->title }}</h2>

                    <div>
                        <span>{{ __("Likes : {$post->likes->count()}") }}</span>
                        @if($post->myLike == false)
                            <form method="POST" class="d-inline" action="{{ route('like.store', ['post' => $post->id]) }}">
                                @csrf
                                <button type="submit" class="bg-transparent border-0">
                                    <i class="far fa-heart"></i>
                                </button>
                            </form>
                        @else
                            <form method="POST" class="d-inline" action="{{ route('like.destroy', ['like' => $post->myLike]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-transparent border-0">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </form>
                        @endif

                    </div>
                </div>

                <p>{{ __("Category: {$post->category->name}") }}</p>

                <div>
                    <div class="mb-3">
                        @empty(!$post->image)
                            <img src="{{ asset('/images/'.$post->image->path) }}" class="img-fluid rounded">
                        @endempty
                    </div>

                    <div class="mb-5">
                        {!! $post->body !!}
                    </div>

                    <hr>
                    <div class="row">
                        @empty(!$next)
                            @include('components.posts.item', ['post' => $next ])
                        @endempty
                        @empty(!$prev)
                            @include('components.posts.item', ['post' => $prev ])
                        @endempty

                    </div>

                </div>

            </div>

            <div class="shadow-sm bg-white p-5 mt-4">

                <h2 class="h1">{{ __('Comment') }}</h2>

                <hr>
                <form method="POST" action="{{ route('comment.store', ['post' => $post->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="comment">{{ __('Your comment') }}</label>
                        <input type="hidden" name="reply" value="">
                        <textarea name="text" class="form-control" id="comment" rows="6"></textarea>
                    </div>
                    <button type="submit" class="btn btn-lr btn-block mb-5">
                        {{ __('Comment') }}
                    </button>
                </form>

                <div>
                    <h2>{{ __("All comments {$post->comments->count()}") }}</h2>

                    <hr>
                    <div>
                        @if(!$post->comments->isEmpty())
                            @include('components.comments.list', ['comments' => $post->comments])
                        @else
                            <div class="alert alert-warning" role="alert">
                                {{ __('No comments found') }}
                            </div>
                        @endif
                    </div>
                </div>
          
            </div>

        </div>

        <div class="col-md-4">

            @include('components.sidebar')

        </div>
    </div>
</div>
@endsection


