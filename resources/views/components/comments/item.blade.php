    <div class="comment @if($comment->comment_parent !== null) ml-3 @endif">
        <div class="media border p-3 rounded mb-3 @if($comment->comment_parent !== null) mt-3 @endif">
            <img 
                src="{{ $comment->user->profileImage }}" 
                class="mr-3" 
                alt="{{ $comment->user->username }}" 
                width="100" 
                height="100">
            <div class="media-body">
                <h5 class="mt-0">
                    {{ $comment->user->username }}
                </h5>

                <hr>

                <div id="{{ "comment-{$comment->id}" }}">
                    <p>
                        {{ $comment->text }}
                    </p>
                </div>

                <option-comment-component
                    :user="{{ Auth::id() == $comment->user_id ? 'true' : 'false' }}"
                    :comment="{{ $comment }}">
                </option-comment-component>

            </div>
        </div>

        @empty(!$comment->replies)
            @include('components.comments.list', ['comments' => $comment->replies])
        @endempty                                   
    </div>