@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="shadow-sm bg-white rounded p-5 mt-4">

                <h2 class="text-center">{{ __('My posts') }}</h2>

                <div>
                <form method="POST" action="{{ route('post.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="col-form-label">{{ __('Title') }}</label>

                        <div class="row">
                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control mb-3 border-lr @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-lr btn-block">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>
                            </div>                    

                        </div>
                    </div>
                </form>

                <hr>

                <div>
                    @if(!$posts->isEmpty())

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Published at</th>
                            <th scope="col">Status</th>
                            <th scope="col">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->published_at->format('Y-M-d H:i') }}</td>
                                <td>
                                    @if($post->status->name == 'public')
                                        <span class="badge badge-success">{{ $post->status->name }}</span>
                                    @elseif($post->status->name == 'private')
                                        <span class="badge badge-info">{{ $post->status->name }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $post->status->name }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('post.show', ['post' => $post->slug]) }}" class="btn btn-success">Show</a>
                                    <a href="{{ route('post.edit', ['post' => $post->slug]) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" action="{{ route('post.destroy', ['post' => $post->slug]) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $posts->links() }}

                    @else
                        <div class="alert alert-warning" role="alert">
                            {{ __('No post found') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

