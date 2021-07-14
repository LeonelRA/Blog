@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <form method="POST" class="row" action="{{ route('post.update', ['post' => $post->slug]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="shadow bg-white radius-lr p-5 mt-4 col-md-8">

                <h2 class="text-center">{{ __('update your post') }}</h2>
                <div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">{{ __('Title') }}</label>

                        <div>
                            <input id="title" type="text" class="form-control rounded-pill border-lr @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}" required autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="slug" class="col-form-label">{{ __('Slug') }}</label>

                        <div>
                            <input id="slug" type="text" class="form-control rounded-pill border-lr @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') ?? $post->slug }}">

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="excerpt" class="col-form-label">{{ __('Excerpt') }}</label>

                        <div>

                            <textarea id="excerpt" name="excerpt" class="form-control" style="height: 8rem;">{{ old('excerpt') ?? $post->excerpt }}</textarea>

                            @error('excerpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body" class="col-form-label">{{ __('Excerpt') }}</label>

                        <div>

                            <input id="body" name="body" type="hidden" value="{{ old('body') ?? $post->body }}">
                            <trix-editor input="body"></trix-editor>

                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="mt-4">
                            <button type="submit" class="btn btn-lr btn-block rounded-pill">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="shadow bg-white radius-lr p-5 mt-4">
                    <h2 class="text-center">{{ __('Categories') }}</h2>

                    <div>
                        <select name="category" class="custom-select border-lr rounded-pill">
                            @foreach($categories as $category)
                                <option {{ ($category->name == $post->category->name || $category->name == old('category')) ? 'selected' : ''}} value="{{ $category->name }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="shadow bg-white radius-lr p-5 mt-4">
                    <h2 class="text-center">{{ __('Tags') }}</h2>

                    <div>
                        @foreach($tags as $tag)
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" name="tags[]" 
                                    value="{{ $tag->id }}" 
                                    id="{{ $tag->name }}"
                                    @empty(!$post->image) 
                                        @foreach($post->tags as $tagSelected) 
                                        {{ $tagSelected->name == $tag->name ? 'checked' : '' }} 
                                        @endforeach>
                                    @endempty
                                <label class="form-check-label" for="{{ $tag->name }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="shadow bg-white radius-lr p-5 mt-4">
                    <h2 class="text-center">{{ __('Status') }}</h2>

                    <div>
                          <select name="status" class="custom-select border-lr rounded-pill">
                            @foreach($statuses as $status)
                                <option {{ ($status->name == $post->status->name || $status->name == old('status')) ? 'selected' : ''}} value="{{ $status->name }}">
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>                      
                    </div>

                </div>

                <div class="shadow bg-white radius-lr p-5 mt-4">
                    <h2 class="text-center">{{ __('Image') }}</h2>

                    <div>
                        <div class="mb-3">
                            @empty($post->image)
                                <div class="alert alert-warning" role="alert">
                                    Without image
                                </div>
                            @else
                                <img src="{{ asset('/images/'.$post->image->path) }}" class="img-fluid rounded">
                            @endempty
                        </div>
                        <div class="custom-file">
                            <input id="image" type="file" accept="image/*" name="image" class="custom-file-input">
                            <label class="custom-file-label">
                                update image...
                            </label>
                        </div>  
                    </div>

                </div>
            </div>



        </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
@endpush

@push('styles')

    <style type="text/css">
        
        body {
            background-color: #38a6ff;
        }

    </style>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">

@endpush
