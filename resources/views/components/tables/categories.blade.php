@if(!$categories->isEmpty())

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
     @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td id="{{ "component-{$category->id}" }}">{{ $category->name }}</td>
            <td>{{ $category->created_at->format('Y-M-d H:i') }}</td>
            <td>
{{-- 				<a href="{{ route('category.edit', ['category' => $category->slug]) }}" class="btn btn-warning">{{  __('Edit') }}</a> 
                <form method="POST" action="{{ route('category.destroy', ['category' => $category->slug]) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{  __('Delete') }}</button>
                </form>  --}}

                <option-categories-tags-component
                    :component="{{ $category }}"
                    type="category">
                </option-categories-tags-component>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>

{{-- {{ $posts->links() }} --}}

@else
    <div class="alert alert-warning" role="alert">
        {{ __('No Categories found') }}
    </div>
@endif