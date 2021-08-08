@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-8 mb-3">

            <div class="shadow-sm bg-white p-5">

                <div class="d-flex justify-content-between">
                    <h2 class="h1 mb-4">{{ $post->title }}</h2>

                    <div>

                        <like-component 
                            :like="{{ $post->myLike }}" 
                            :likes="{{ $post->likes->count() }}"
                            :user="{{ Auth::check() ? Auth::id() : 0 }}" 
                            :post="{{ $post->id }}">    
                        </like-component>

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
                            @include('components.posts.item', ['post' => $next, 'shadow' => false ])
                        @endempty
                        @empty(!$prev)
                            @include('components.posts.item', ['post' => $prev, 'shadow' => false ])
                        @endempty

                    </div>

                </div>

            </div>

            <div class="shadow-sm bg-white p-5 mt-4">

                <h2 class="h1">{{ __('Comment') }}</h2>

                <hr>

                    <comment-component
                        :user="{{ Auth::check() ? Auth::id() : 0 }}"
                        :post="{{ $post->id }}">
                    </comment-component>

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

        <div class="col-md-12 col-lg-4">

            @include('components.sidebar.list', ['shadow' => false ])

        </div>
    </div>
</div>
@endsection


