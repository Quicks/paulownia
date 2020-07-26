$(function() {
    //common function
    function findParent(element, selector = '.comment_info'){
        return $(element).parents(selector)
    }
    function findCommentId(element){
        return findParent(element).data('comment-id');
    }
    function getToken() {
        return $('input[name="csrf_token"]').val();
    }

    // reply to comment functionality
    $('.comment-reply').click(function() {
        let parent = findParent(this).first();
        parent.find('.reply-comment-form').first().show();
        $('.comment-reply').hide();
    });
    $('.submit-reply').click(function() {
        let parent =  findParent(this, '.reply-comment-form').first();
        parent.hide();
        $('.comment-reply').show();
    });

    $('.cancel').click(function() {
        let parent =  findParent(this, '.reply-comment-form').first();
        if(parent[0]) {
            parent.hide();
            $('.comment-reply').show();
        } else {
            let mainParent = findParent(this, '.comment-area').first();
            $(mainParent).children().last()[0].reset();
        }
    });

});
