<ul class="list_none comment_list">
    @foreach($comments as $comment)
        @include('public.comments.card', ['comment' => $comment])
    @endforeach
</ul>