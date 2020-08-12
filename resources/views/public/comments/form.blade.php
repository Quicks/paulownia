<form class="field_form form_style2" name="enq" action="{{route('public.comments.create')}}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="form-group col-md-4">
            <input name="owner" class="form-control" placeholder="{{ __('comments.your_name')}}" required="required" type="text">
        </div>
        <div class="form-group col-md-4">
            <input name="email" class="form-control" placeholder="{{ __('comments.your_email')}}" required="required" type="email">
        </div>
        <div class="form-group col-md-4">
            <input name="website" class="form-control" placeholder="{{ __('comments.your_website')}}" required="required" type="text">
        </div>
        <div class="form-group col-md-12">
            <textarea rows="3" name="text" class="form-control" maxlength="1000" placeholder="{{ __('comments.your_comment')}}" required="required"></textarea>
        </div>
        {{ Form::hidden('parent_id', $parent_id) }}
        {{ Form::hidden('commentable_type', $commentable_type) }}
        {{ Form::hidden('commentable_id', $commentable_id) }}
        <div class="form-group col-md-12">
            <button value="Submit" name="submit" class="btn btn-default submit-reply" title="Submit Your Message!" type="submit">{{ __('comments.submit')}}</button>
            <button value="cancel" name="cancel" class="btn btn-default cancel" title="Cancel Your Message!" type="button">{{ __('comments.cancel')}}</button>
        </div>
    </div>
</form>