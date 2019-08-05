$(document).ready(function () {
    tinymce.init({
        selector: 'textarea',
        height: 200,
        width: "100%",
        plugins: 'image imagetools media wordcount save fullscreen code',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent  | removeformat | code',
        image_advtab: true,
        setup: function (editor) {
            editor.on("change keyup", function(e){
                tinyMCE.triggerSave();
                $(editor.getElement()).trigger('change');
            });
        }
    });
});