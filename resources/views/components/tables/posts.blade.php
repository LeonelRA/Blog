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