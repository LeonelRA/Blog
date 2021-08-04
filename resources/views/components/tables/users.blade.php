@if(!$users->isEmpty())

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Created at</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->username }}</td>
            <td>{{ $user->profile->name }}</td>
            <td>{{ $user->profile->last_name }}</td>
            <td>{{ $user->created_at->format('Y-M-d H:i') }}</td>
            <td>
                <a href="{{ route('user.show', ['user' => $user->username]) }}" class="btn btn-success">Show</a>
                <a href="{{ route('user.edit', ['user' => $user->username]) }}" class="btn btn-warning">Edit</a>
                <form method="POST" action="{{ route('user.destroy', ['user' => $user->username]) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>  
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $users->links() }}

@else
    <div class="alert alert-warning" role="alert">
        {{ __('No post found') }}
    </div>
@endif