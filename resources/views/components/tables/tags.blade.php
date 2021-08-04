@if(!$tags->isEmpty())

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Published at</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
     @foreach($tags as $tag)
        <tr>
            <th scope="row">{{ $tag->id }}</th>
            <td id="{{ "component-{$tag->id}" }}">{{ $tag->name }}</td>
            <td>{{ $tag->created_at->format('Y-M-d H:i') }}</td>
            <td>
                {{-- <a href="{{ route('tag.edit', ['tag' => $tag->slug]) }}" class="btn btn-warning">{{  __('Edit') }}</a> 
                <form method="POST" action="{{ route('tag.destroy', ['tag' => $tag->slug]) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{  __('Delete') }}</button>
                </form>  --}}

                <option-categories-tags-component
                    :component="{{ $tag }}"
                    type="tag">
                </option-categories-tags-component>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>

{{-- {{ $posts->links() }} --}}

@else
    <div class="alert alert-warning" role="alert">
        {{ __('No Tags found') }}
    </div>
@endif