@foreach($comments as $comment)
    @include('components.comments.item', ['comment' => $comment])
@endforeach