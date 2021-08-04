@if(!$components->isEmpty())

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Post</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
    @foreach($components as $component)
        <tr>
            <th scope="row">{{ $component->id }}</th>

            @empty(!$component->likeable)
                <td>{{ $component->likeable->title }}</td>
                
                <td>
                    <a href="{{ route('post.show', ['post' => $component->likeable->slug]) }}" class="btn btn-success">Show</a>
                </td>
            @endempty

            @empty(!$component->post)
                <td>{{ $component->post->title }}</td>

                <td>
                    <a href="{{ route('post.show', ['post' => $component->post->slug]) }}" class="btn btn-success">Show</a>
                </td>
            @endif
            
        </tr>
    @endforeach
    </tbody>
</table>

{{ $components->links() }}

@else
    <div class="alert alert-warning" role="alert">
        {{ __('No likes found') }}
    </div>
@endif