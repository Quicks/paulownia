<form class="field_form form_style2" name="enq" action="{{route('public.comments.create')}}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="form-group col-md-4">
            <input name="owner" class="form-control" placeholder="Your Name" required="required" type="text">
        </div>
        <div class="form-group col-md-4">
            <input name="email" class="form-control" placeholder="Your Email" required="required" type="email">
        </div>
        <div class="form-group col-md-4">
            <input name="website" class="form-control" placeholder="Your Website" required="required" type="text">
        </div>
        <div class="form-group col-md-12">
            <textarea rows="3" name="text" class="form-control" placeholder="Your Comment" required="required"></textarea>
        </div>
        {{ Form::hidden('parent_id', $parent_id) }}
        {{ Form::hidden('commentable_type', $commentable_type) }}
        {{ Form::hidden('commentable_id', $commentable_id) }}
        <div class="form-group col-md-12">
            <button value="Submit" name="submit" class="btn btn-default .submit-reply" title="Submit Your Message!" type="submit">Submit</button>
        </div>
    </div>
</form>