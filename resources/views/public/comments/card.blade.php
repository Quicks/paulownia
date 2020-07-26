<li class="comment_info" data-comment-id="{{$comment->id}}">
    <div class="d-flex">
        <div class="user_img">
            <img class="radius_all_5" src="/images/client_img1.jpg" alt="client_img1">
        </div>
        <div class="comment_content">
            <div class="d-flex">
                <div class="meta_data">
                    <h6><a href="#">{{$comment->owner}}</a></h6>
                    <div class="comment-time">{{$comment->created_at}}</div>
                </div>
                <div class="ml-auto">
                    <a href="javascript:void(0);" class="comment-reply btn btn-default rounded-0 btn-sm">{{ __('comments.reply')}}</a>
                </div>
            </div>
            <p>{{$comment->text}}</p>
        </div>
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    </div>
    <div class="reply-comment-form" style="display: none">
        @include('public.comments.form', [
            'commentable_id' => $news->id,
            'commentable_type' => get_class($news),
            'parent_id' => $comment->id
        ])
    </div>
    @if($comment->childs)
        <ul class="children_comment">
            @foreach($comment->childs as $comment)
                @include('public.comments.card', ['comment' => $comment])
            @endforeach
        </ul>
    @endif
</li>
